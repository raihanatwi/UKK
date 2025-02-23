<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Model ini digunakan untuk mengelola data siswa yang akan disimpan ke dalam database.
class siswa extends Model
{
    protected $fillable = [
        'nama_siswa',
        'kelas_siswa',
        'nis_siswa',
        'nisn_siswa',
        'tempat_lahir_siswa',
        'tanggal_lahir_siswa',
        'jenis_kelamin_siswa',
        'alamat_siswa',
        'kelurahan_siswa',
        'kecamatan_siswa'
    ];
}
