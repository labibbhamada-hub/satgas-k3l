<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_mahasiswa');
            $table->string('nim');
            $table->foreignId('prodi_id')->constrained('prodis')->onDelete('cascade');
            $table->foreignId('jenis_kejadian_id')->constrained('jenis_kejadians')->onDelete('cascade');
            $table->string('tempat');
            $table->date('tanggal_laporan');
            $table->date('tanggal_verifikasi');
            $table->date('tanggal_selesai');
            $table->string('ttd_pelapor');
            $table->enum('status', ['dikirim', 'diverifikasi', 'selesai', 'ditolak'])->default('dikirim');
            $table->text('catatan_verikasi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
