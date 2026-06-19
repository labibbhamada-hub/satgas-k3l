<?php

namespace App\Http\Controllers\Instansi;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\Prodi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::where('user_id', auth()->user()->id)
            ->latest()
            ->get();

        return view('instansi.laporan.index', compact('laporans'));
    }

    public function create()
    {
        $prodis = Prodi::where('is_active', true)
            ->get();

        return view('instansi.laporan.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_mahasiswa' => 'required',
            'prodi_id' => 'required',
            'gender' => 'required',
            'usia' => 'required',
            'tanggal_kejadian' => 'required',
            'jam_kejadian' => 'required',
            'lokasi_kejadian' => 'required',
            'tingkat_keparahan' => 'required',
            'jenis_insiden' => 'required',
            'kronologi' => 'required',
            'dampak' => 'required',
            'tindakan' => 'required',
            'penanganan_oleh' => 'required',
            'kejadian_serupa' => 'required',
        ], [
            'nama_mahasiswa.required' => 'Nama Mahasiswa harus diisi!',
            'prodi_id.required' => 'Program Studi harus dipilih!',
            'gender.required' => 'Jenis Kelamin harus diisi!',
            'usia.required' => 'Usia harus diisi!',
            'tanggal_kejadian' => 'Tanggal Kejadian harus diisi!',
            'jam_kejadian' => 'Jam Kejadian harus diisi!',
            'lokasi_kejadian' => 'Lokasi Kejadian harus diisi!',
            'tingkat_keparahan' => 'Tingkat Keparahan harus dipilih!',
            'jenis_insiden' => 'Jenis Insiden harus dipilih!',
            'kronologi' => 'Kronologi harus diisi!',
            'dampak' => 'Dampak harus diisi!',
            'tindakan' => 'Tindakan harus diisi!',
            'penanganan_oleh' => 'Penanganan Oleh harus diisi!',
            'kejadian_serupa' => 'Kejadian Serupa harus dipilih!',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors())->with('error', 'Gagal membuat Laporan!');
        }

        $laporan = Laporan::create([
            'user_id' => auth()->user()->id,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'prodi_id' => $request->prodi_id,
            'gender' => $request->gender,
            'usia' => $request->usia,
            'tanggal_kejadian' => $request->tanggal_kejadian,
            'jam_kejadian' => $request->jam_kejadian,
            'lokasi_kejadian' => $request->lokasi_kejadian,
            'tingkat_keparahan' => $request->tingkat_keparahan,
            'jenis_insiden' => $request->jenis_insiden,
            'kronologi' => $request->kronologi,
            'dampak' => $request->dampak,
            'tindakan' => $request->tindakan,
            'penanganan_oleh' => $request->penanganan_oleh,
            'kejadian_serupa' => $request->kejadian_serupa,
            'tanggal_laporan' => Carbon::now(),
            'status' => 'dikirim',
        ]);

        if (!$laporan) {
            return back()->withInput()->with('error', 'Gagal membuat Laporan!');
        }

        return redirect('instansi/laporan')->with('success', 'Berhasil membuat Laporan');
    }

    public function show(int $id)
    {
        $laporan = Laporan::with(['user', 'prodi'])->findOrFail($id);

        return view('instansi.laporan.show', compact('laporan'));
    }
}
