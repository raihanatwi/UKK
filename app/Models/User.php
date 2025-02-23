<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Relations\HasMany;
class User extends Authenticatable
{
//    Model ini digunakan untuk mengelola data pengguna yang akan disimpan ke dalam database.
    public static string $ADMIN = "ADMIN";
    public static string $USER = "SISWA";
//   Model ini digunakan untuk mengelola data pengguna yang akan disimpan ke dalam database.
    protected $fillable = [
        'name',
        'email',
        'nis',
        'password',
        'role'
    ];
    protected $hidden = [
        'password',
    ];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'created_at' => 'datetime',
            'updated_at' => 'datetime'
        ];
    }
    

    // 🔹 Relasi ke tabel perizinan berdasarkan NIS
    public function perizinan(): HasMany
    {
        return $this->hasMany(Perizinan::class, 'nis_siswa', 'nis');
    }
}