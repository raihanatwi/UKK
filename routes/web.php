<?php

use App\Http\Controllers\ActivityLogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PerizinanController;




Route::get('/', function () {
    return view('auth.login');
});

Route::resource('siswa', SiswaController::class)->middleware('auth');

Route::get('/login', [AuthenticationController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticationController::class, 'authenticate'])->name('authenticate')->middleware('guest');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', [RegisterController::class, 'registration'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Middleware auth untuk memastikan user login
Route::middleware(['auth'])->group(function () {
    // Semua pengguna bisa mengakses
    Route::get('/perizinan', [PerizinanController::class, 'index'])->name('perizinan.index');
    Route::get('/perizinan/create', [PerizinanController::class, 'create'])->name('perizinan.create');
    Route::post('/perizinan', [PerizinanController::class, 'store'])->name('perizinan.store');
    Route::get('/perizinan/{nis}', [PerizinanController::class, 'show'])->name('perizinan.show');

    // Hanya admin yang bisa update status
    Route::middleware(['admin'])->group(function () {
        Route::patch('/perizinan/{perizinan}/status', [PerizinanController::class, 'updateStatus'])
            ->name('perizinan.updateStatus');
    });
});



Route::get('/siswa/{siswa:nis_siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::get('/siswa/{siswa:nis_siswa}', [SiswaController::class, 'show'])->name('siswa.show');
Route::post('/siswa/{siswa:nis_siswa}/delete', [SiswaController::class, 'destroy'])->name('siswa.delete');



