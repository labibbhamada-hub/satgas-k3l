<?php

namespace App\Http\Controllers\Instansi;

use App\Http\Controllers\Controller;
use App\Models\Laporan;

class HomeController extends Controller
{
    public function index()
    {
        $laporan_menunggu = Laporan::where([
            ['user_id', auth()->user()->id],
            ['status', 'dikirim']
        ])->count();
        $laporan_proses = Laporan::where([
            ['user_id', auth()->user()->id],
            ['status', 'diverifikasi']
        ])->count();
        $laporan_selesai = Laporan::where([
            ['user_id', auth()->user()->id],
            ['status', 'selesai']
        ])->count();

        return view('instansi.index', compact('laporan_menunggu', 'laporan_proses', 'laporan_selesai'));
    }
}
