<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan_area_kampuses', function (Blueprint $table) {
            $table->id();
            $table->string('pelapor_nama');
            $table->string('pelapor_bagian');
            $table->string('korban_nama');
            $table->string('korban_bagian');
            $table->date('kejadian_tanggal');
            $table->time('kejadian_jam');
            $table->string('kejadian_lokasi');
            $table->string('kejadian_jenis');
            $table->longText('kejadian_kronologi');
            $table->text('kejadian_dampak');
            $table->text('penanganan_tindakan');
            $table->string('penanganan_oleh');
            $table->boolean('is_pernah');
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
        Schema::dropIfExists('laporan_area_kampuses');
    }
};
