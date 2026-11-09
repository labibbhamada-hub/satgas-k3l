<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ActiveAccountMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_deactivated_user_is_logged_out_on_next_request(): void
    {
        $user = User::create([
            'nama' => 'Penanggung Jawab Test',
            'telp' => fake()->unique()->numerify('08##########'),
            'password' => 'PasswordLama123',
            'role' => 'instansi',
            'nama_instansi' => 'Instansi Test',
        ]);

        // Login ketika akun masih aktif.
        $loginResponse = $this->post('/login', [
            'telp' => $user->telp,
            'password' => 'PasswordLama123',
        ]);

        $loginResponse->assertRedirect('instansi');
        $this->assertAuthenticatedAs($user);

        // Simulasikan akun dinonaktifkan oleh Satgas.
        DB::table('users')
            ->where('id', $user->id)
            ->update(['is_active' => false]);

        // Pastikan user dimuat ulang dari database pada request berikutnya.
        Auth::forgetGuards();

        // Sesi lama tidak boleh lagi mengakses dashboard.
        $response = $this->get('/instansi');

        $response->assertRedirect(route('login'));
        $response->assertSessionHas('error');

        $this->assertGuest();
    }
}
