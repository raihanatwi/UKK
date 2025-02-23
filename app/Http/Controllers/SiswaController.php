<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Database\UniqueConstraintViolationException;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class SiswaController extends Controller implements HasMiddleware
{   
    // Middeleware untuk memberikan akses (edit,delete) hanya kepada admin
    public static function middleware(): array
    {
        return [
            new Middleware(
                AdminMiddleware::class, 
                only: ['edit', 'update', 'destroy', 'store', 'create']
            ),
        ];
    }

   // Menampilkan data siswa
public function index(Request $request)
{   
    // Mengambil parameter query "search" dari request
    $search = $request->query("search");
    // Mengambil parameter query "kelas_siswa" dari request
    $class = $request->query("kelas_siswa");
    // Membuat query dasar untuk model Siswa
    $allSiswa = Siswa::query();

    // Menambahkan kondisi pencarian ke query
    $allSiswa->where(function ($query) use ($class, $search) {
        // Jika parameter "kelas_siswa" ada, tambahkan kondisi untuk kelas siswa
        if ($class) {
            $query->where('kelas_siswa', $class);
        }
        // Jika parameter "search" ada, tambahkan kondisi pencarian untuk nama, NIS, atau NISN siswa
        if ($search) {
            $query->where(function ($subQuery) use ($search) {
                $subQuery->where('nama_siswa', 'like', "%$search%")
                         ->orWhere('nis_siswa', 'like', "%$search%")
                         ->orWhere('nisn_siswa', 'like', "%$search%");
            });
        }
    });

    // Menjalankan query dan mengambil semua hasil
    $allSiswa = $allSiswa->get();
    // Mengambil semua kelas siswa yang unik
    $classes = Siswa::select('kelas_siswa')->distinct()->get();
    // Mengembalikan view 'siswa.index' dengan data siswa, kelas, parameter kelas, dan parameter pencarian
    return view('siswa.index', compact('allSiswa', 'classes', 'class', 'search'));
}

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diinput apakah sesuai dengan kriteria
        $request->validate([
            "nama_siswa" => "required|max:100|regex:/^[\pL\s]+$/u",
            "kelas_siswa" => "required|",
            "nis_siswa" => "required|digits:5|numeric",
            "nisn_siswa" => "required|digits:10|numeric",
            "tempat_lahir_siswa" => "required|max:50",
            "tanggal_lahir_siswa" => "required",
            "jenis_kelamin_siswa" => "required",
            "alamat_siswa" => "required|max:100",
            "kelurahan_siswa" => "required|max:50",
            "kecamatan_siswa" => "required|max:50",
        ]);
        // jika nisn atau nis sudah terdaftar maka tidak bisa menambahkan siswa
        $siswa = Siswa::where('nisn_siswa', $request->nisn_siswa)->first();
        if ($siswa != null) {
            return redirect()->back()->with([
                'message' => 'NISN sudah terdaftar'
            ]);
        }
        $siswa = Siswa::where('nis_siswa', $request->nis_siswa)->first();
        if ($siswa != null) {
            return redirect()->back()->with([
                'message' => 'NIS sudah terdaftar'
            ]);
        }
        // Menambahkan data siswa baru ke database
        Siswa::create($request->all());
        return redirect()->route('siswa.index')->with([
            'success' => 'User baru telah ditambahkan'
        ]);
    }
    // Menampilkan detail siswa
    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }
    // Menampilkan form edit siswa
    public function edit(string $id)
    {   
        // Mengambil data siswa berdasarkan NIS
        $siswa = Siswa::where('nis_siswa', $id)->firstOrFail();
        return view('siswa.edit', compact('siswa'));
    }
    // Mengupdate data siswa
    public function update(Request $request, string $id)
    {
        // Validasi data yang diinput apakah sesuai dengan kriteria
        $request->validate([
            "nama_siswa" => "required|max:100|regex:/^[\pL\s]+$/u",
            "kelas_siswa" => "required|",
            "nis_siswa" => "required|digits:5|numeric",
            "nisn_siswa" => "required|digits:10|numeric",
            "tempat_lahir_siswa" => "required|max:50",
            "tanggal_lahir_siswa" => "required",
            "jenis_kelamin_siswa" => "required",
            "alamat_siswa" => "required|max:100",
            "kelurahan_siswa" => "required|max:50",
            "kecamatan_siswa" => "required|max:50",
        ]); 
        // Mengupdate data siswa 
        try {
            Siswa::where('nis_siswa', $id)->update([
                'nis_siswa' => $request->nis_siswa,
                'nisn_siswa' => $request->nisn_siswa,
                'nama_siswa' => $request->nama_siswa,
                'kelas_siswa' => $request->kelas_siswa,
                'alamat_siswa' => $request->alamat_siswa,
                'tempat_lahir_siswa' => $request->tempat_lahir_siswa,
                'tanggal_lahir_siswa' => $request->tanggal_lahir_siswa,
                'jenis_kelamin_siswa' => $request->jenis_kelamin_siswa,
                'kelurahan_siswa' => $request->kelurahan_siswa,
                'kecamatan_siswa' => $request->kecamatan_siswa,
            ]);
        //Jika NIS sudah terdaftar maka akan menampilkan pesan 
        } catch (UniqueConstraintViolationException) {
            return redirect()->back()->with([
                'message' => 'NIS sudah terdaftar'
            ]);
        }
        // Jika berhasil akan kembali ke halaman siswa.index
        return redirect()->route('siswa.index')->with([
            'success' => 'berhasil mengubah data'
        ]);
    }
    // Menghapus data siswa
    public function destroy(Siswa $siswa)
    {
        // Menghapus data dan kembali ke halaman sebelumnya
        $siswa->delete();
        return redirect()->back();
    }
}
