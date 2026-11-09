<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileUpdateTest extends TestCase
{
    use RefreshDatabase;

    private function createUser(string $role): User
    {
        return User::create([
            'nama' => 'Pengguna Test',
            'telp' => fake()->unique()->numerify('08##########'),
            'password' => 'PasswordLama123',
            'role' => $role,
            'nama_instansi' => $role === 'instansi'
                ? 'Instansi Test'
                : 'Data Test ' . ucfirst($role),
        ]);
    }

    public function test_dev_can_update_profile_without_nama_instansi(): void
    {
        $user = $this->createUser('dev');

        $response = $this->actingAs($user)
            ->from('/perbarui-profile')
            ->post('/perbarui-profile', [
                'nama' => 'Dev Baru',
                'telp' => '081234567801',
            ]);

        $response->assertRedirect('/perbarui-profile');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'nama' => 'Dev Baru',
            'telp' => '081234567801',
        ]);
    }

    public function test_satgas_can_update_profile_without_nama_instansi(): void
    {
        $user = $this->createUser('satgas');

        $response = $this->actingAs($user)
            ->from('/perbarui-profile')
            ->post('/perbarui-profile', [
                'nama' => 'Satgas Baru',
                'telp' => '081234567802',
            ]);

        $response->assertRedirect('/perbarui-profile');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'nama' => 'Satgas Baru',
            'telp' => '081234567802',
        ]);
    }

    public function test_instansi_can_update_profile(): void
    {
        $user = $this->createUser('instansi');

        $response = $this->actingAs($user)
            ->from('/perbarui-profile')
            ->post('/perbarui-profile', [
                'nama' => 'Penanggung Jawab Baru',
                'nama_instansi' => 'Instansi Baru',
                'telp' => '081234567803',
            ]);

        $response->assertRedirect('/perbarui-profile');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'nama' => 'Penanggung Jawab Baru',
            'nama_instansi' => 'Instansi Baru',
            'telp' => '081234567803',
        ]);
    }

    public function test_instansi_must_provide_nama_instansi(): void
    {
        $user = $this->createUser('instansi');

        $response = $this->actingAs($user)
            ->post('/perbarui-profile', [
                'nama' => 'Penanggung Jawab Baru',
                'telp' => '081234567804',
            ]);

        $response->assertSessionHasErrors('nama_instansi');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'nama_instansi' => 'Instansi Test',
        ]);
    }

    public function test_non_instansi_cannot_change_nama_instansi(): void
    {
        $user = $this->createUser('dev');

        $this->actingAs($user)
            ->post('/perbarui-profile', [
                'nama' => 'Dev Baru',
                'telp' => '081234567805',
                'nama_instansi' => 'Manipulasi Nama Instansi',
            ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'nama' => 'Dev Baru',
            'nama_instansi' => 'Data Test Dev',
        ]);
    }

    public function test_user_cannot_use_another_users_phone_number(): void
    {
        $user = $this->createUser('dev');
        $anotherUser = $this->createUser('satgas');

        $response = $this->actingAs($user)
            ->post('/perbarui-profile', [
                'nama' => 'Dev Baru',
                'telp' => $anotherUser->telp,
            ]);

        $response->assertSessionHasErrors('telp');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'telp' => $user->telp,
        ]);
    }

    public function test_user_can_keep_their_own_phone_number(): void
    {
        $user = $this->createUser('dev');

        $response = $this->actingAs($user)
            ->from('/perbarui-profile')
            ->post('/perbarui-profile', [
                'nama' => 'Dev Diperbarui',
                'telp' => $user->telp,
            ]);

        $response->assertRedirect('/perbarui-profile');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'nama' => 'Dev Diperbarui',
            'telp' => $user->telp,
        ]);
    }
}
