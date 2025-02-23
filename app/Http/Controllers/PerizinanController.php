<?php
namespace App\Http\Controllers;

use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Termwind\Components\Dd;

class PerizinanController extends Controller
{
    /**
     * Middleware authentication
     */
    protected array $middleware = [
        'auth'
    ];

    public function index()
    {
        if (Auth::user()->role === 'ADMIN') {
            $perizinan = Perizinan::with('user')->latest()->paginate(10);
        } else {
            $perizinan = Perizinan::where('nis_siswa',  Auth::user()->nis)->latest()->paginate(10);
        }

        return view('perizinan.awal', compact('perizinan'));
    }

    public function create()
    {
        $jenisIzin = ['Sakit', 'Izin', 'Keperluan Keluarga', 'Lainnya'];
        return view('perizinan.absen', compact('jenisIzin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_izin' => 'required',
            'tanggal_izin' => 'required|date',
            'keterangan' => 'required|string',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);
    
        $data = $request->all();
        $data['nis_siswa'] = Auth::user()->nis; // Ambil NIS dari user
        $data['nama'] = Auth::user()->name; // Simpan nama siswa
    
        if ($request->hasFile('dokumen_pendukung')) {
            $data['dokumen_pendukung'] = $request->file('dokumen_pendukung')->store('dokumen_perizinan', 'public');
        }
    
        Perizinan::create($data);
    
        return redirect()->route('perizinan.index')->with('success', 'Perizinan berhasil diajukan.');
    }

    public function show($nis)
    {

        $perizinan = Perizinan::findOrFail($nis);
        return view('perizinan.lihat', ['perizinan' => $perizinan]);
        

    }
    

    public function updateStatus(Request $request, Perizinan $perizinan)
    {
        if (Auth::user()->role !== 'ADMIN') {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:pending,disetujui,ditolak',
            'catatan_admin' => 'required|string'
        ]);

        $perizinan->update([
            'status' => $request->status,
            'catatan_admin' => $request->catatan_admin,
            'approved_by' => Auth::id()
        ]);

        return redirect()->route('perizinan.awal')->with('success', 'Status perizinan berhasil diupdate.');
    }
}
