<?php
namespace App\Http\Controllers\Satgas;

use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        return view('satgas.laporan.index');
    }
}
