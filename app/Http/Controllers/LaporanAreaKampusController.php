<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LaporanAreaKampus;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class LaporanAreaKampusController extends Controller
{
    public function index()
    {
        $prodis = Prodi::where('is_active', true)
            ->get();

        return view('laporan.area-kampus.index', compact('prodis'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pelapor_nama' => ['required', 'string', 'max:255'],
            'pelapor_bagian' => ['required', 'string', 'max:255'],
            'korban_nama' => ['required', 'string', 'max:255'],
            'korban_bagian' => ['required', 'string', 'max:255'],
            'kejadian_tanggal' => ['required', 'date', 'before_or_equal:today'],
            'kejadian_jam' => ['required', 'date_format:H:i'],
            'kejadian_lokasi' => ['required', 'string', 'max:255'],
            'kejadian_jenis' => [
                'required',
                Rule::in([
                    'Terkena benda tajam',
                    'Paparan radiasi / toksik',
                    'Tumpahan / paparan B3',
                    'Tersengat listrik',
                    'Terpleset / terjatuh',
                    'Cedera akibat alat kerja',
                    'Lainnya',
                ]),
            ],
            'kejadian_jenis_lainnya' => [
                'required_if:kejadian_jenis,Lainnya',
                'nullable',
                'string',
                'max:255',
            ],
            'kejadian_kronologi' => ['required', 'string'],
            'kejadian_dampak' => ['required', 'string'],
            'penanganan_tindakan' => ['required', 'string'],
            'penanganan_oleh' => ['required', 'string', 'max:255'],
            'is_pernah' => ['required', 'boolean'],
        ], [
            'pelapor_nama.required' => 'Nama Pelapor harus diisi!',
            'pelapor_bagian.required' => 'Unit / Program Studi harus diisi!',
            'korban_nama.required' => 'Nama Korban harus diisi!',
            'korban_bagian.required' => 'Unit / Program Studi harus diisi!',
            'kejadian_tanggal.required' => 'Tanggal Kejadian harus diisi!',
            'kejadian_tanggal.date' => 'Format Tanggal Kejadian tidak valid!',
            'kejadian_tanggal.before_or_equal' => 'Tanggal Kejadian tidak boleh melebihi hari ini!',
            'kejadian_jam.required' => 'Jam Kejadian harus diisi!',
            'kejadian_jam.date_format' => 'Format Jam Kejadian tidak valid!',
            'kejadian_lokasi.required' => 'Lokasi Kejadian harus diisi!',
            'kejadian_jenis.required' => 'Jenis Insiden harus dipilih!',
            'kejadian_jenis.in' => 'Jenis Insiden tidak valid!',
            'kejadian_jenis_lainnya.required_if' => 'Jenis Insiden Lainnya harus diisi!',
            'kejadian_kronologi.required' => 'Kronologi harus diisi!',
            'kejadian_dampak.required' => 'Dampak harus diisi!',
            'penanganan_tindakan.required' => 'Tindakan harus diisi!',
            'penanganan_oleh.required' => 'Penanganan Oleh harus diisi!',
            'is_pernah.required' => 'Kejadian Serupa harus dipilih!',
            'is_pernah.boolean' => 'Pilihan Kejadian Serupa tidak valid!',
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'Gagal membuat Laporan!');
        }

        $validated = $validator->validated();

        $kejadianJenis = $validated['kejadian_jenis'] === 'Lainnya'
            ? $validated['kejadian_jenis_lainnya']
            : $validated['kejadian_jenis'];

        LaporanAreaKampus::create([
            'pelapor_nama' => $validated['pelapor_nama'],
            'pelapor_bagian' => $validated['pelapor_bagian'],
            'korban_nama' => $validated['korban_nama'],
            'korban_bagian' => $validated['korban_bagian'],
            'kejadian_tanggal' => $validated['kejadian_tanggal'],
            'kejadian_jam' => $validated['kejadian_jam'],
            'kejadian_lokasi' => $validated['kejadian_lokasi'],
            'kejadian_jenis' => $kejadianJenis,
            'kejadian_kronologi' => $validated['kejadian_kronologi'],
            'kejadian_dampak' => $validated['kejadian_dampak'],
            'penanganan_tindakan' => $validated['penanganan_tindakan'],
            'penanganan_oleh' => $validated['penanganan_oleh'],
            'is_pernah' => $validated['is_pernah'],
            'tanggal_laporan' => Carbon::now()->format('Y-m-d'),
            'status' => 'dikirim',
        ]);

        return redirect()
            ->route('buat-laporan.area-kampus.success')
            ->with('success', 'Berhasil membuat Laporan');
    }

    public function success()
    {
        return view('laporan.area-kampus.show');
    }
}
