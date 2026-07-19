<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class LaporanAreaKampusController extends Controller
{
    public function index()
    {
        $prodis = Prodi::where('is_active', true)
            ->get();
            
        return view('laporan.area-kampus.index', compact('prodis'));
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'catatan_verifikasi' => 'required',
        ], [
            'catatan_verifikasi.required' => 'Catatan Verifikasi harus diisi!',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors())->with('error', 'Gagal mengonfirmasi Laporan!');
        }

        $laporan = Laporan::where('id', $id)->update([
            'catatan_verifikasi' => $request->catatan_verifikasi,
            'tanggal_verifikasi' => Carbon::now(),
            'status' => 'diverifikasi'
        ]);

        if (!$laporan) {
            return back()->withInput()->with('error', 'Gagal mengonfirmasi Laporan!');
        }

        return redirect('satgas/laporan')->with('success', 'Berhasil mengonfirmasi Laporan');
    }

    public function selesaikan(int $id)
    {
        $cek = Laporan::where([
            ['id', $id],
            ['status', 'diverifikasi'],
        ])->first();

        if (!$cek) {
            return back()->with('error', 'Gagal menyelesaikan Laporan');
        }

        $laporan = Laporan::where('id', $id)->update([
            'tanggal_selesai' => Carbon::now(),
            'status' => 'selesai'
        ]);

        if (!$laporan) {
            return back()->withInput()->with('error', 'Gagal menyelesaikan Laporan!');
        }

        return redirect('satgas/laporan')->with('success', 'Berhasil menyelesaikan Laporan');
    }

    public function print(int $id)
    {
        $laporan = Laporan::with(['user', 'prodi'])->findOrFail($id);
        $satgas = User::where('role', 'satgas')->first();

        $pdf = Pdf::loadview('satgas.laporan.print', compact('laporan', 'satgas'));
        return $pdf->stream('Form Laporan Insiden Kecelakaan Kerja.pdf');
    }
}
