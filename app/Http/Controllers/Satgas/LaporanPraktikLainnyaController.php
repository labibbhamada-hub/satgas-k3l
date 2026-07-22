<?php

namespace App\Http\Controllers\Satgas;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\LaporanPraktikLainnya;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class LaporanPraktikLainnyaController extends Controller
{
    public function index()
    {
        $laporans = LaporanPraktikLainnya::latest()->get();

        return view('satgas.laporan-praktik-lainnya.index', compact('laporans'));
    }

    public function show(int $id)
    {
        $laporan = LaporanPraktikLainnya::findOrFail($id);

        return view('satgas.laporan-praktik-lainnya.show', compact('laporan'));
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

        return redirect('satgas/laporan-nsi')->with('success', 'Berhasil mengonfirmasi Laporan');
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

        return redirect('satgas/laporan-nsi')->with('success', 'Berhasil menyelesaikan Laporan');
    }

    public function print(int $id)
    {
        $laporan = LaporanPraktikLainnya::findOrFail($id);
        $satgas = User::where('role', 'satgas')->first();

        $pdf = Pdf::loadview('satgas.laporan-praktik-lainnya.print', compact('laporan', 'satgas'));
        return $pdf->stream('Form Laporan Insiden Kecelakaan Kerja.pdf');
    }
}
