<?php
namespace App\Http\Controllers\Instansi;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('instansi.index');
    }
}
