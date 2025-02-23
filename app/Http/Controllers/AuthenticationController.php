<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller

{
    public function login() 
    {
        // menampilkan form login
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // mengvalidasi data yang di input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $credentials = $request->only('email', 'password');

        // memproses login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('siswa.index');
        }

        // memberikan pesan ketika mengalami kesalahan
        return redirect()->back()->with([
            'message' => 'Email atau password salah'
        ]);
    }

    // fungsi untuk keluar akun
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

}
