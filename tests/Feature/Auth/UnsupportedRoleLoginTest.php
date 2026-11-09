<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UnsupportedRoleLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_role_cannot_login_to_unsupported_dashboard(): void
    {
        $user = User::create([
            'nama' => 'Admin Test',
            'telp' => '081234567899',
            'password' => 'PasswordLama123',
            'role' => 'admin',
            'nama_instansi' => 'Data Test Admin',
        ]);

        $response = $this->post('/login', [
            'telp' => $user->telp,
            'password' => 'PasswordLama123',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHas('error', 'Role tidak valid');

        $this->assertGuest();
    }
}
