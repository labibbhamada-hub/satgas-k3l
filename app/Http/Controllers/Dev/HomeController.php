<?php
namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('dev.index');
    }
}
