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
        if (! Auth::check()) {
            return view('login');
        }

        $user = Auth::user();

        if ($user->must_change_password) {
            return redirect()->route('password.edit');
        }

        return $this->redirect_by_role($user);
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'telp' => ['required'],
            'password' => ['required'],
        ], [
            'telp.required' => 'No. Telepon harus diisi!',
            'password.required' => 'Password harus diisi!',
        ]);

        $credentials = [
            'telp' => $request->telp,
            'password' => $request->password,
            'is_active' => true,
        ];

        if (! Auth::attempt($credentials)) {
            return back()
                ->withInput($request->only('telp'))
                ->with('error', 'No. Telepon atau Password salah!');
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // Pengguna dengan password sementara wajib menggantinya.
        if ($user->must_change_password) {
            return redirect()->route('password.edit');
        }

        return $this->redirect_by_role($user);
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
            'dev' => redirect('dev'),
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
        $user = Auth::user();

        $rules = [
            'nama' => 'required',
            'telp' => 'required|unique:users,telp,' . $user->id,
        ];

        $messages = [
            'nama.required' => 'Nama harus diisi!',
            'telp.required' => 'No. Telepon harus diisi!',
            'telp.unique' => 'No. Telepon sudah digunakan!',
        ];

        // Nama Instansi hanya diwajibkan untuk akun Instansi.
        if ($user->role === 'instansi') {
            $rules['nama_instansi'] = 'required';
            $messages['nama_instansi.required'] = 'Nama Instansi harus diisi!';
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator->errors())
                ->with('error', 'Gagal memperbarui Profile!');
        }

        $validated = $validator->validated();

        $data = [
            'nama' => $validated['nama'],
            'telp' => $validated['telp'],
        ];

        // Hanya akun Instansi yang memperbarui nama_instansi.
        if ($user->role === 'instansi') {
            $data['nama_instansi'] = $validated['nama_instansi'];
        }

        $user->fill($data)->save();

        return back()->with('success', 'Berhasil memperbarui Profile!');
    }

    public function perbarui_password()
    {
        return view('perbarui-password');
    }

    public function perbarui_password_proses(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed',
            ],
        ];

        $messages = [
            'password.required' => 'Password baru harus diisi!',
            'password.min' => 'Password baru minimal 6 karakter!',
            'password.confirmed' => 'Konfirmasi password tidak sama!',
        ];

        // Password lama hanya diperlukan untuk perubahan password normal.
        if (! $user->must_change_password) {
            $rules['current_password'] = [
                'required',
                'current_password',
            ];

            $messages['current_password.required'] = 'Password saat ini harus diisi!';
            $messages['current_password.current_password'] = 'Password saat ini salah!';
        }

        $validated = $request->validate($rules, $messages);

        // Model cast "hashed" akan menangani hashing password.
        $user->forceFill([
            'password' => $validated['password'],
            'must_change_password' => false,
        ])->save();

        // Regenerasi session setelah perubahan kredensial.
        $request->session()->regenerate();

        return $this->redirect_by_role($user)
            ->with('success', 'Password berhasil diperbarui!');
    }
}
