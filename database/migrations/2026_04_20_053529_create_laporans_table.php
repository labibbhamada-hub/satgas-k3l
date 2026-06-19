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
            $table->foreignId('prodi_id')->constrained('prodis')->onDelete('cascade');
            $table->enum('gender', ['L', 'P']);
            $table->string('usia');
            $table->date('tanggal_kejadian');
            $table->time('jam_kejadian');
            $table->string('lokasi_kejadian');
            $table->enum('tingkat_keparahan', ['1', '2', '3']);
            $table->string('jenis_insiden');
            $table->longText('kronologi');
            $table->text('dampak');
            $table->text('tindakan');
            $table->string('penanganan_oleh');
            $table->boolean('kejadian_serupa');
            $table->date('tanggal_laporan');
            $table->date('tanggal_verifikasi')->nullable();
            $table->date('tanggal_selesai')->nullable();
            // $table->string('ttd_pelapor');
            $table->enum('status', ['dikirim', 'diverifikasi', 'selesai', 'ditolak'])->default('dikirim');
            $table->text('catatan_verifikasi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
