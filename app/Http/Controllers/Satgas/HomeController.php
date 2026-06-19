<?php

namespace App\Http\Controllers\Satgas;

use App\Http\Controllers\Controller;
use App\Models\Laporan;

class HomeController extends Controller
{
    public function index()
    {
        $laporan_menunggu = Laporan::where('status', 'dikirim')->count();
        $laporan_proses = Laporan::where('status', 'diverifikasi')->count();
        $laporan_selesai = Laporan::where('status', 'selesai')->count();

        return view('satgas.index', compact('laporan_menunggu', 'laporan_proses', 'laporan_selesai'));
    }
}
