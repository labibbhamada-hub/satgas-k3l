<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPraktikLainnya extends Model
{
    protected $fillable = [
        'pelapor_nama',
        'pelapor_bagian',
        'korban_nama',
        'korban_bagian',
        'kejadian_tanggal',
        'kejadian_jam',
        'kejadian_tempat',
        'kejadian_lokasi',
        'kejadian_jenis',
        'kejadian_kronologi',
        'kejadian_dampak',
        'penanganan_tindakan',
        'penanganan_oleh',
        'is_pernah',
        'tanggal_laporan',
        'tanggal_verifikasi',
        'tanggal_selesai',
        'status',
        'catatan_verikasi',
    ];
}
