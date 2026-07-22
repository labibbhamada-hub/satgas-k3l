<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\LaporanAreaKampus;
use App\Models\LaporanPraktikLainnya;

class HomeController extends Controller
{
    public function index()
    {
        $laporan_nsi = Laporan::count();
        $laporan_area_kampus = LaporanAreaKampus::count();
        $laporan_praktik_lainnya = LaporanPraktikLainnya::count();
        $jumlah_laporan = $laporan_nsi + $laporan_area_kampus + $laporan_praktik_lainnya;

        return view('index', compact('jumlah_laporan'));
    }
}
