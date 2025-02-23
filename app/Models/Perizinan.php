<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perizinan extends Model
{
    protected $table = 'perizinan';
    
    protected $fillable = [
        'nama',
        'jenis_izin',
        'nis_siswa',
        'tanggal_izin',
        'catatan_admin',
        'status',
        'keterangan',
        'aprroved_by',
        'dokumen_pendukung',
    ];

    protected $casts = [
        'tanggal_izin' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nis_siswa', 'nis');
    }
    
}