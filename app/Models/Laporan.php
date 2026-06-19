<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'user_id',
        'nama_mahasiswa',
        'prodi_id',
        'gender',
        'usia',
        'tanggal_kejadian',
        'jam_kejadian',
        'lokasi_kejadian',
        'tingkat_keparahan',
        'jenis_insiden',
        'kronologi',
        'dampak',
        'tindakan',
        'penanganan_oleh',
        'kejadian_serupa',
        'tanggal_laporan',
        'tanggal_verifikasi',
        'tanggal_selesai',
        'status',
        'catatan_verikasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
