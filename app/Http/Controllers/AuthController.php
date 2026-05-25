<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        if (!Auth::check()) {
            return view('login');
        }

        return $this->redirect_by_role(Auth::user());
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'telp' => 'required',
            'password' => 'required',
        ], [
            'telp.required' => 'No. Telepon harus diisi!',
            'password.required' => 'Password harus diisi!',
        ]);

        if (Auth::attempt($request->only('telp', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('login');
        }

        return back()->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    private function redirect_by_role(User $user)
    {
        return match ($user->role) {
            'admin' => redirect('admin'),
            'satgas' => redirect('satgas'),
            'instansi' => redirect('instansi'),
            default => $this->invalid_role(),
        };
    }

    private function invalid_role()
    {
        Auth::logout();

        return redirect('login')->with('error', 'Role tidak valid');
    }

    public function perbarui_profile()
    {
        $user = Auth::user();

        return view('perbarui-profile', compact('user'));
    }

    public function perbarui_profile_proses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_instansi' => 'required',
            'nama' => 'required',
            'telp' => 'required|unique:users,telp,' . auth()->user()->id,
        ], [
            'nama_instansi.required' => 'Nama Instansi harus diisi!',
            'nama.required' => 'Nama Penanggung Jawab harus diisi!',
            'telp.required' => 'No. Telepon harus diisi!',
            'telp.unique' => 'No. Telepon sudah digunakan!',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors())->with('error', 'Gagal memperbarui Profile!');
        }

        $user = User::where('id', auth()->user()->id)->update([
            'nama_instansi' => $request->nama_instansi,
            'nama' => $request->nama,
            'telp' => $request->telp,
        ]);

        if (!$user) {
            return back()->withInput()->withErrors($validator->errors())->with('error', 'Gagal memperbarui Profile!');
        }

        return back()->with('success', 'Berhasil memperbarui Profile!');
    }

    public function perbarui_password()
    {
        return view('perbarui-password');
    }

    public function perbarui_password_proses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ], [
            'password.required' => 'Password harus diisi!',
            'password_confirmation.required' => 'Konfirmasi Password harus diisi!',
            'password_confirmation.same' => 'Konfirmasi Password tidak sama!',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors())->with('error', 'Gagal memperbarui Password!');
        }

        $user = User::where('id', auth()->user()->id)->update([
            'password' => bcrypt($request->password),
        ]);

        if (!$user) {
            return back()->withInput()->withErrors($validator->errors())->with('error', 'Gagal memperbarui Password!');
        }

        return back()->with('success', 'Berhasil memperbarui Password!');
    }
}
