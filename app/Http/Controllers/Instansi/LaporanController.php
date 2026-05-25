<?php

namespace App\Http\Controllers\Instansi;

use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        return view('instansi.laporan.index');
    }

    public function create()
    {
        return view('instansi.laporan.create');
    }
}
