<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class RegisterController extends Controller
{
    // Menampilkan form buat akun
    public function registration()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi data yang diinput apakah sesuai dengan kriteria
        $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|numeric|digits:5',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        // Buat pengguna dengan peran "SISWA"
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nis' => $request->nis,
            'password' => Hash::make($request->password),
            'role' => 'SISWA', // Set peran default
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        
        return redirect()->route('siswa.index')->with('success', 'Registrasi berhasil!');
    }
}