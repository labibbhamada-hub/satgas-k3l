<?php

namespace App\Http\Controllers\Satgas;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $prodis = Prodi::where('is_active', true)->get();

        return view('satgas.instansi.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_instansi' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string', 'max:255'],
            'telp' => ['required', 'string', 'max:255', 'unique:users,telp'],
        ], [
            'nama_instansi.required' => 'Nama Instansi harus diisi!',
            'nama.required' => 'Penanggung Jawab harus diisi!',
            'telp.required' => 'No. Telepon harus diisi!',
            'telp.unique' => 'No. Telepon sudah digunakan!',
        ]);

        $temporaryPassword = Str::random(32);

        $user = new User([
            'nama_instansi' => $validated['nama_instansi'],
            'nama' => $validated['nama'],
            'telp' => $validated['telp'],
            'password' => $temporaryPassword,
            'role' => 'instansi',
        ]);

        $user->forceFill([
            'must_change_password' => true,
        ]);

        $user->save();

        return redirect()
            ->route('instansi.index')
            ->with('success', 'Berhasil menambahkan Instansi.')
            ->with('temporary_password', $temporaryPassword)
            ->with('temporary_password_for', $user->nama_instansi);
    }

    public function show(int $id)
    {
        $laporan = Laporan::with(['user', 'prodi'])->findOrFail($id);

        return view('satgas.instansi.show', compact('laporan'));
    }

    public function edit(int $id)
    {
        $user = User::where('id', $id)
            ->where('role', 'instansi')
            ->firstOrFail();

        return view('satgas.instansi.edit', compact('user'));
    }

    public function update(Request $request, int $id)
    {
        $user = User::where('role', 'instansi')->findOrFail($id);

        $validated = $request->validate([
            'nama_instansi' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string', 'max:255'],
            'telp' => ['required', 'string', 'max:255', 'unique:users,telp,' . $id],
        ], [
            'nama_instansi.required' => 'Nama Instansi harus diisi!',
            'nama.required' => 'Penanggung Jawab harus diisi!',
            'telp.required' => 'No. Telepon harus diisi!',
            'telp.unique' => 'No. Telepon sudah digunakan!',
        ]);

        $user->update($validated);

        return redirect('satgas/instansi')
            ->with('success', 'Berhasil memperbarui Instansi.');
    }

    public function updateStatus(Request $request, int $id)
    {
        $validated = $request->validate([
            'is_active' => ['required', 'boolean'],
        ]);

        $user = User::where('role', 'instansi')
            ->findOrFail($id);

        $user->forceFill([
            'is_active' => $validated['is_active'],
        ])->save();

        $message = $user->is_active
            ? 'Berhasil mengaktifkan Instansi.'
            : 'Berhasil menonaktifkan Instansi.';

        return back()->with('success', $message);
    }

    public function reset_password(int $id)
    {
        $user = User::where('role', 'instansi')->findOrFail($id);

        $temporaryPassword = Str::random(32);

        $user->forceFill([
            'password' => $temporaryPassword,
            'must_change_password' => true,
        ]);

        $user->save();

        return redirect()
            ->route('instansi.index')
            ->with('success', 'Berhasil mereset password Instansi.')
            ->with('temporary_password', $temporaryPassword)
            ->with('temporary_password_for', $user->nama_instansi);
    }
}
