<?php

namespace App\Http\Controllers\Instansi;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\Prodi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
            'nama_mahasiswa' => ['required', 'string', 'max:255'],
            'prodi_id' => [
                'required',
                'integer',
                Rule::exists('prodis', 'id')->where('is_active', true),
            ],
            'gender' => ['required', Rule::in(['L', 'P'])],
            'usia' => ['required', 'integer', 'min:1', 'max:100'],
            'tanggal_kejadian' => ['required', 'date', 'before_or_equal:today'],
            'jam_kejadian' => ['required', 'date_format:H:i'],
            'lokasi_kejadian' => ['required', 'string', 'max:255'],
            'tingkat_keparahan' => ['required', Rule::in(['1', '2', '3'])],
            'jenis_insiden' => ['required', 'string', 'max:255'],
            'kronologi' => ['required', 'string'],
            'dampak' => ['required', 'string'],
            'tindakan' => ['required', 'string'],
            'penanganan_oleh' => ['required', 'string', 'max:255'],
            'kejadian_serupa' => ['required', 'boolean'],
        ], [
            'nama_mahasiswa.required' => 'Nama Mahasiswa harus diisi!',
            'prodi_id.required' => 'Program Studi harus dipilih!',
            'prodi_id.integer' => 'Program Studi tidak valid!',
            'prodi_id.exists' => 'Program Studi tidak ditemukan atau sudah nonaktif!',
            'gender.required' => 'Jenis Kelamin harus diisi!',
            'gender.in' => 'Jenis Kelamin tidak valid!',
            'usia.required' => 'Usia harus diisi!',
            'usia.integer' => 'Usia harus berupa angka bulat!',
            'usia.min' => 'Usia minimal 1 tahun!',
            'usia.max' => 'Usia maksimal 100 tahun!',
            'tanggal_kejadian.required' => 'Tanggal Kejadian harus diisi!',
            'tanggal_kejadian.date' => 'Format Tanggal Kejadian tidak valid!',
            'tanggal_kejadian.before_or_equal' => 'Tanggal Kejadian tidak boleh melebihi hari ini!',
            'jam_kejadian.required' => 'Jam Kejadian harus diisi!',
            'jam_kejadian.date_format' => 'Format Jam Kejadian tidak valid!',
            'lokasi_kejadian.required' => 'Lokasi Kejadian harus diisi!',
            'tingkat_keparahan.required' => 'Tingkat Keparahan harus dipilih!',
            'tingkat_keparahan.in' => 'Tingkat Keparahan tidak valid!',
            'jenis_insiden.required' => 'Jenis Insiden harus dipilih!',
            'kronologi.required' => 'Kronologi harus diisi!',
            'dampak.required' => 'Dampak harus diisi!',
            'tindakan.required' => 'Tindakan harus diisi!',
            'penanganan_oleh.required' => 'Penanganan Oleh harus diisi!',
            'kejadian_serupa.required' => 'Kejadian Serupa harus dipilih!',
            'kejadian_serupa.boolean' => 'Pilihan Kejadian Serupa tidak valid!',
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'Gagal membuat Laporan!');
        }

        $validated = $validator->validated();

        $laporan = Laporan::create([
            'user_id' => auth()->id(),
            'nama_mahasiswa' => $validated['nama_mahasiswa'],
            'prodi_id' => $validated['prodi_id'],
            'gender' => $validated['gender'],
            'usia' => $validated['usia'],
            'tanggal_kejadian' => $validated['tanggal_kejadian'],
            'jam_kejadian' => $validated['jam_kejadian'],
            'lokasi_kejadian' => $validated['lokasi_kejadian'],
            'tingkat_keparahan' => $validated['tingkat_keparahan'],
            'jenis_insiden' => $validated['jenis_insiden'],
            'kronologi' => $validated['kronologi'],
            'dampak' => $validated['dampak'],
            'tindakan' => $validated['tindakan'],
            'penanganan_oleh' => $validated['penanganan_oleh'],
            'kejadian_serupa' => $validated['kejadian_serupa'],
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
        $laporan = Laporan::with(['user', 'prodi'])
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        return view('instansi.laporan.show', compact('laporan'));
    }
}
