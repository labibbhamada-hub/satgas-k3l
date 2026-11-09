<?php

namespace App\Http\Controllers\Satgas;

use App\Http\Controllers\Controller;

use App\Models\LaporanAreaKampus;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class LaporanAreaKampusController extends Controller
{
    public function index()
    {
        $laporans = LaporanAreaKampus::latest()->get();

        return view('satgas.laporan-area-kampus.index', compact('laporans'));
    }

    public function show(int $id)
    {
        $laporan = LaporanAreaKampus::findOrFail($id);

        return view('satgas.laporan-area-kampus.show', compact('laporan'));
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'catatan_verifikasi' => 'required',
        ], [
            'catatan_verifikasi.required' => 'Catatan Verifikasi harus diisi!',
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator->errors())
                ->with('error', 'Gagal mengonfirmasi Laporan!');
        }

        $validated = $validator->validated();

        $updated = LaporanAreaKampus::where('id', $id)
            ->where('status', 'dikirim')
            ->update([
                'catatan_verifikasi' => $validated['catatan_verifikasi'],
                'tanggal_verifikasi' => Carbon::now(),
                'status' => 'diverifikasi',
            ]);

        if (!$updated) {
            return back()->withInput()->with('error', 'Laporan tidak ditemukan atau sudah diproses.');
        }

        return redirect('satgas/laporan-area-kampus')->with('success', 'Berhasil mengonfirmasi Laporan');
    }

    public function selesaikan(int $id)
    {
        $updated = LaporanAreaKampus::where('id', $id)
            ->where('status', 'diverifikasi')
            ->update([
                'tanggal_selesai' => Carbon::now(),
                'status' => 'selesai',
            ]);

        if (!$updated) {
            return back()->with('error', 'Laporan tidak ditemukan atau belum diverifikasi.');
        }

        return redirect('satgas/laporan-area-kampus')->with('success', 'Berhasil menyelesaikan Laporan');
    }

    public function print(int $id)
    {
        $laporan = LaporanAreaKampus::findOrFail($id);
        $satgas = User::where('role', 'satgas')->first();

        $pdf = Pdf::loadview('satgas.laporan-area-kampus.print', compact('laporan', 'satgas'));
        return $pdf->stream('Form Laporan Insiden Kecelakaan Kerja.pdf');
    }
}
