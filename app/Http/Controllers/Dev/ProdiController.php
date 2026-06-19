<?php
namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::all();

        return view('dev.prodi.index', compact('prodis'));
    }

    public function create()
    {
        return view('dev.prodi.create');
    }
}
