<?php
namespace App\Http\Controllers\Satgas;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('satgas.index');
    }
}
