<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Membuat tabel siswas
    public function up(): void
    {
        // Membuat tabel siswas
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->string('kelas_siswa');
            $table->Integer('nis_siswa');
            $table->bigInteger('nisn_siswa');
            $table->string('tempat_lahir_siswa');
            $table->date('tanggal_lahir_siswa');
            $table->string('jenis_kelamin_siswa');
            $table->string('alamat_siswa');
            $table->string('kelurahan_siswa');
            $table->string('kecamatan_siswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    
    // Menghapus tabel siswas
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
