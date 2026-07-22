<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\LaporanAreaKampus;
use App\Models\LaporanPraktikLainnya;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class LaporanPraktikLainnyaController extends Controller
{
    public function index()
    {
        $prodis = Prodi::where('is_active', true)
            ->get();

        return view('laporan.praktik-lainnya.index', compact('prodis'));
    }

    public function store(Request $request)
    {
        if ($request->kejadian_jenis == 'Lainnya') {
            $kejadian_jenis_lainnya = 'required';
        } else {
            $kejadian_jenis_lainnya = 'nullable';
        }

        $validator = Validator::make($request->all(), [
            'pelapor_nama' => 'required',
            'pelapor_bagian' => 'required',
            'korban_nama' => 'required',
            'korban_bagian' => 'required',
            'kejadian_tanggal' => 'required',
            'kejadian_jam' => 'required',
            'kejadian_tempat' => 'required',
            'kejadian_lokasi' => 'required',
            'kejadian_jenis' => 'required',
            'kejadian_jenis_lainnya' => $kejadian_jenis_lainnya,
            'kejadian_kronologi' => 'required',
            'kejadian_dampak' => 'required',
            'penanganan_tindakan' => 'required',
            'penanganan_oleh' => 'required',
            'is_pernah' => 'required',
        ], [
            'pelapor_nama.required' => 'Nama Pelapor harus diisi!',
            'pelapor_bagian.required' => 'Unit / Program Studi harus dipilih!',
            'korban_nama.required' => 'Nama Korban harus diisi!',
            'korban_bagian.required' => 'Unit / Program Studi harus dipilih!',
            'kejadian_tanggal' => 'Tanggal Kejadian harus diisi!',
            'kejadian_jam' => 'Jam Kejadian harus diisi!',
            'kejadian_tempat' => 'Tempat Praktik harus diisi!',
            'kejadian_lokasi' => 'Lokasi Kejadian harus diisi!',
            'kejadian_jenis' => 'Jenis Insiden harus dipilih!',
            'kejadian_jenis_lainnya' => 'Jenis Insiden Lainnya harus diisi!',
            'kejadian_kronologi' => 'Kronologi harus diisi!',
            'kejadian_dampak' => 'Dampak harus diisi!',
            'penanganan_tindakan' => 'Tindakan harus diisi!',
            'penanganan_oleh' => 'Penanganan Oleh harus diisi!',
            'is_pernah' => 'Kejadian Serupa harus dipilih!',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors())->with('error', 'Gagal membuat Laporan!');
        }

        if ($request->kejadian_jenis == 'Lainnya') {
            $kejadian_jenis = $request->kejadian_jenis_lainnya;
        } else {
            $kejadian_jenis = $request->kejadian_jenis;
        }

        $laporan = LaporanPraktikLainnya::create([
            'pelapor_nama' => $request->pelapor_nama,
            'pelapor_bagian' => $request->pelapor_bagian,
            'korban_nama' => $request->korban_nama,
            'korban_bagian' => $request->korban_bagian,
            'kejadian_tanggal' => $request->kejadian_tanggal,
            'kejadian_jam' => $request->kejadian_jam,
            'kejadian_tempat' => $request->kejadian_tempat,
            'kejadian_lokasi' => $request->kejadian_lokasi,
            'kejadian_jenis' => $kejadian_jenis,
            'kejadian_kronologi' => $request->kejadian_kronologi,
            'kejadian_dampak' => $request->kejadian_dampak,
            'penanganan_tindakan' => $request->penanganan_tindakan,
            'penanganan_oleh' => $request->penanganan_oleh,
            'is_pernah' => $request->is_pernah,
            'tanggal_laporan' => Carbon::now()->format('Y-m-d'),
            'status' => 'dikirim',
        ]);

        if (!$laporan) {
            return back()->withInput()->with('error', 'Gagal membuat Laporan!');
        }

        return redirect('buat-laporan/praktik-lainnya/success')->with('success', 'Berhasil membuat Laporan');
    }

    public function success()
    {
        return view('laporan.praktik-lainnya.show');
    }
}
