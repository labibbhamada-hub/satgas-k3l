<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PasswordChangeTest extends TestCase
{
    use RefreshDatabase;

    private function createInstansi(bool $mustChangePassword = false): User
    {
        $user = User::create([
            'nama' => 'Penanggung Jawab Test',
            'telp' => fake()->unique()->numerify('08##########'),
            'password' => 'PasswordLama123',
            'role' => 'instansi',
            'nama_instansi' => 'Instansi Test',
        ]);

        $user->forceFill([
            'must_change_password' => $mustChangePassword,
        ])->save();

        return $user;
    }

    /**
     * Password sementara wajib mengarahkan pengguna
     * ke halaman perubahan password.
     */
    public function test_user_with_temporary_password_cannot_access_instansi_dashboard(): void
    {
        $user = $this->createInstansi(true);

        $response = $this->actingAs($user)->get('/instansi');

        $response->assertRedirect(route('password.edit'));
    }

    /**
     * Pengguna dengan password sementara tidak boleh
     * mengakses halaman profil.
     */
    public function test_user_with_temporary_password_cannot_access_profile(): void
    {
        $user = $this->createInstansi(true);

        $response = $this->actingAs($user)->get('/perbarui-profile');

        $response->assertRedirect(route('password.edit'));
    }

    /**
     * Pengguna dengan password sementara tetap boleh logout.
     */
    public function test_user_with_temporary_password_can_logout(): void
    {
        $user = $this->createInstansi(true);

        $response = $this->actingAs($user)
            ->post(route('logout'));

        $response->assertRedirect('/login');

        $this->assertGuest();
    }

    /**
     * Pengguna dengan password sementara dapat membuka
     * halaman perubahan password.
     */
    public function test_user_with_temporary_password_can_access_password_page(): void
    {
        $user = $this->createInstansi(true);

        $response = $this->actingAs($user)
            ->get(route('password.edit'));

        $response->assertOk();
    }

    /**
     * Password sementara dapat diganti tanpa password lama.
     */
    public function test_user_can_change_temporary_password_without_current_password(): void
    {
        $user = $this->createInstansi(true);

        $response = $this->actingAs($user)->post(route('password.update'), [
            'password' => 'PasswordBaru123',
            'password_confirmation' => 'PasswordBaru123',
        ]);

        $response->assertRedirect('instansi');

        $user->refresh();

        $this->assertTrue(Hash::check('PasswordBaru123', $user->password));
        $this->assertFalse($user->must_change_password);
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Password baru minimal 6 karakter.
     */
    public function test_password_less_than_six_characters_is_rejected(): void
    {
        $user = $this->createInstansi(true);

        $response = $this->actingAs($user)->post(route('password.update'), [
            'password' => '12345',
            'password_confirmation' => '12345',
        ]);

        $response->assertSessionHasErrors('password');

        $user->refresh();

        $this->assertTrue($user->must_change_password);
        $this->assertTrue(Hash::check('PasswordLama123', $user->password));
    }

    /**
     * Konfirmasi password harus sama.
     */
    public function test_password_confirmation_must_match(): void
    {
        $user = $this->createInstansi(true);

        $response = $this->actingAs($user)->post(route('password.update'), [
            'password' => 'PasswordBaru123',
            'password_confirmation' => 'PasswordBerbeda123',
        ]);

        $response->assertSessionHasErrors('password');

        $user->refresh();

        $this->assertTrue($user->must_change_password);
    }

    /**
     * Perubahan password normal wajib memasukkan password lama.
     */
    public function test_normal_password_change_requires_current_password(): void
    {
        $user = $this->createInstansi(false);

        $response = $this->actingAs($user)->post(route('password.update'), [
            'password' => 'PasswordBaru123',
            'password_confirmation' => 'PasswordBaru123',
        ]);

        $response->assertSessionHasErrors('current_password');
    }

    /**
     * Password lama yang salah harus ditolak.
     */
    public function test_normal_password_change_rejects_wrong_current_password(): void
    {
        $user = $this->createInstansi(false);

        $response = $this->actingAs($user)->post(route('password.update'), [
            'current_password' => 'PasswordSalah123',
            'password' => 'PasswordBaru123',
            'password_confirmation' => 'PasswordBaru123',
        ]);

        $response->assertSessionHasErrors('current_password');

        $user->refresh();

        $this->assertTrue(Hash::check('PasswordLama123', $user->password));
    }

    /**
     * Password lama yang benar memungkinkan perubahan password.
     */
    public function test_normal_password_change_succeeds_with_correct_current_password(): void
    {
        $user = $this->createInstansi(false);

        $response = $this->actingAs($user)->post(route('password.update'), [
            'current_password' => 'PasswordLama123',
            'password' => 'PasswordBaru123',
            'password_confirmation' => 'PasswordBaru123',
        ]);

        $response->assertRedirect('instansi');

        $user->refresh();

        $this->assertTrue(Hash::check('PasswordBaru123', $user->password));
        $this->assertFalse($user->must_change_password);
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Akun Instansi aktif dapat login menggunakan kredensial yang benar.
     */
    public function test_active_instansi_can_login(): void
    {
        $user = $this->createInstansi();

        $response = $this->post('/login', [
            'telp' => $user->telp,
            'password' => 'PasswordLama123',
        ]);

        $response->assertRedirect('instansi');

        $this->assertAuthenticatedAs($user);
    }

    /**
     * Akun Instansi nonaktif tidak dapat login meskipun password benar.
     */
    public function test_inactive_instansi_cannot_login(): void
    {
        $user = $this->createInstansi();

        $user->forceFill([
            'is_active' => false,
        ])->save();

        $response = $this->post('/login', [
            'telp' => $user->telp,
            'password' => 'PasswordLama123',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('error');

        $this->assertGuest();
    }

    /**
     * Akun aktif dengan password sementara tetap diarahkan
     * ke halaman perubahan password setelah login.
     */
    public function test_active_instansi_with_temporary_password_must_change_password(): void
    {
        $user = $this->createInstansi(true);

        $response = $this->post('/login', [
            'telp' => $user->telp,
            'password' => 'PasswordLama123',
        ]);

        $response->assertRedirect(route('password.edit'));

        $this->assertAuthenticatedAs($user);
    }
}
