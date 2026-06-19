<?php

namespace App\Http\Controllers\Satgas;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\Prodi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstansiController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'instansi')
            ->orderBy('nama_instansi')
            ->get();

        return view('satgas.instansi.index', compact('users'));
    }

    public function create()
    {
        $prodis = Prodi::where('is_active', true)
            ->get();

        return view('satgas.instansi.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_instansi' => 'required',
            'nama' => 'required',
            'telp' => 'required|unique:users,telp',
        ], [
            'nama_instansi.required' => 'Nama Instansi harus diisi!',
            'nama.required' => 'Penanggung Jawab harus diisi!',
            'telp.required' => 'No. Telepon harus diisi!',
            'telp.unique' => 'No. Telepon sudah digunakan!',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors())->with('error', 'Gagal menambahkan Instansi!');
        }

        $user = User::create([
            'nama_instansi' => $request->nama_instansi,
            'nama' => $request->nama,
            'telp' => $request->telp,
            'password' => bcrypt('bhamada'),
            'role' => 'instansi',
        ]);

        if (!$user) {
            return back()->withInput()->with('error', 'Gagal menambahkan Instansi!');
        }

        return redirect('satgas/instansi')->with('success', 'Berhasil menambahkan Instansi');
    }

    public function show(int $id)
    {
        $laporan = Laporan::with(['user', 'prodi'])->findOrFail($id);

        return view('satgas.instansi.show', compact('laporan'));
    }

    public function edit(int $id)
    {
        $user = User::where([
            ['id', $id],
            ['role', 'instansi']
        ])->first();

        if (!$user) {
            return back()->with('error', 'Gagal menemukan Instansi!');
        }

        return view('satgas.instansi.edit', compact('user'));
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_instansi' => 'required',
            'nama' => 'required',
            'telp' => 'required|unique:users,telp,' . $id,
        ], [
            'nama_instansi.required' => 'Nama Instansi harus diisi!',
            'nama.required' => 'Penanggung Jawab harus diisi!',
            'telp.required' => 'No. Telepon harus diisi!',
            'telp.unique' => 'No. Telepon sudah digunakan!',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors())->with('error', 'Gagal memperbarui Instansi!');
        }

        $user = User::where('id', $id)->update([
            'nama_instansi' => $request->nama_instansi,
            'nama' => $request->nama,
            'telp' => $request->telp,
        ]);

        if (!$user) {
            return back()->withInput()->with('error', 'Gagal memperbarui Instansi!');
        }

        return redirect('satgas/instansi')->with('success', 'Berhasil memperbarui Instansi');
    }

    public function destroy(int $id)
    {
        $cek = User::where([
            ['id', $id],
            ['role', 'instansi']
        ])->first();

        if (!$cek) {
            return back()->with('error', 'Gagal menemukan Instansi!');
        }

        $user = User::where('id', $id)->delete();

        if (!$user) {
            return back()->with('error', 'Gagal menghapus Instansi!');
        }

        return back()->with('success', 'Berhasil menghapus Instansi');
    }

    public function reset_password(int $id)
    {
        $cek = User::where([
            ['id', $id],
            ['role', 'instansi']
        ])->first();

        if (!$cek) {
            return back()->with('error', 'Gagal menemukan Instansi!');
        }

        $user = User::where('id', $id)->update([
            'password' => bcrypt('bhamada')
        ]);

        if (!$user) {
            return back()->with('error', 'Gagal mereset Password!');
        }

        return redirect('satgas/instansi')->with('success', 'Berhasil mereset Password');
    }
}
