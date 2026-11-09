<?php

namespace Tests\Feature\Instansi;

use App\Models\Laporan;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubmitNsiReportTest extends TestCase
{
    use RefreshDatabase;

    private function createInstansi(): User
    {
        return User::create([
            'nama' => 'Penanggung Jawab Test',
            'telp' => fake()->unique()->numerify('08##########'),
            'password' => 'PasswordLama123',
            'role' => 'instansi',
            'nama_instansi' => 'Instansi Test',
        ]);
    }

    private function createProdi(bool $isActive = true): Prodi
    {
        return Prodi::create([
            'nama' => 'Keperawatan',
            'fakultas' => 'fikes',
            'is_active' => $isActive,
        ]);
    }

    private function validReportData(int $prodiId): array
    {
        return [
            'nama_mahasiswa' => 'Mahasiswa Test',
            'prodi_id' => $prodiId,
            'gender' => 'L',
            'usia' => 21,
            'tanggal_kejadian' => now()->toDateString(),
            'jam_kejadian' => '09:00',
            'lokasi_kejadian' => 'Laboratorium',
            'tingkat_keparahan' => '1',
            'jenis_insiden' => 'Kecelakaan Kerja',
            'kronologi' => 'Kronologi pengujian laporan.',
            'dampak' => 'Dampak pengujian.',
            'tindakan' => 'Tindakan pengujian.',
            'penanganan_oleh' => 'Petugas',
            'kejadian_serupa' => '0',
        ];
    }

    public function test_instansi_can_submit_report_with_active_prodi(): void
    {
        $user = $this->createInstansi();
        $prodi = $this->createProdi(true);

        $response = $this->actingAs($user)
            ->post(route('laporan.store'), $this->validReportData($prodi->id));

        $response->assertRedirect('instansi/laporan');

        $this->assertDatabaseHas('laporans', [
            'user_id' => $user->id,
            'prodi_id' => $prodi->id,
            'nama_mahasiswa' => 'Mahasiswa Test',
            'status' => 'dikirim',
        ]);
    }

    public function test_instansi_cannot_submit_report_with_inactive_prodi(): void
    {
        $user = $this->createInstansi();
        $prodi = $this->createProdi(false);

        $response = $this->actingAs($user)
            ->post(route('laporan.store'), $this->validReportData($prodi->id));

        $response->assertSessionHasErrors('prodi_id');

        $this->assertDatabaseMissing('laporans', [
            'user_id' => $user->id,
            'prodi_id' => $prodi->id,
            'nama_mahasiswa' => 'Mahasiswa Test',
        ]);
    }

    public function test_instansi_cannot_submit_report_with_nonexistent_prodi(): void
    {
        $user = $this->createInstansi();

        $response = $this->actingAs($user)
            ->post(route('laporan.store'), $this->validReportData(999999));

        $response->assertSessionHasErrors('prodi_id');

        $this->assertDatabaseCount('laporans', 0);
    }

    public function test_instansi_cannot_submit_report_with_age_below_one(): void
    {
        $user = $this->createInstansi();
        $prodi = $this->createProdi();

        $data = $this->validReportData($prodi->id);
        $data['usia'] = 0;

        $response = $this->actingAs($user)
            ->post(route('laporan.store'), $data);

        $response->assertSessionHasErrors('usia');
        $this->assertDatabaseCount('laporans', 0);
    }

    public function test_instansi_can_submit_report_with_minimum_age(): void
    {
        $user = $this->createInstansi();
        $prodi = $this->createProdi();

        $data = $this->validReportData($prodi->id);
        $data['usia'] = 1;

        $response = $this->actingAs($user)
            ->post(route('laporan.store'), $data);

        $response->assertRedirect('instansi/laporan');

        $this->assertDatabaseHas('laporans', [
            'user_id' => $user->id,
            'usia' => 1,
        ]);
    }

    public function test_instansi_can_submit_report_with_maximum_age(): void
    {
        $user = $this->createInstansi();
        $prodi = $this->createProdi();

        $data = $this->validReportData($prodi->id);
        $data['usia'] = 100;

        $response = $this->actingAs($user)
            ->post(route('laporan.store'), $data);

        $response->assertRedirect('instansi/laporan');

        $this->assertDatabaseHas('laporans', [
            'user_id' => $user->id,
            'usia' => 100,
        ]);
    }

    public function test_instansi_cannot_submit_report_with_age_above_one_hundred(): void
    {
        $user = $this->createInstansi();
        $prodi = $this->createProdi();

        $data = $this->validReportData($prodi->id);
        $data['usia'] = 101;

        $response = $this->actingAs($user)
            ->post(route('laporan.store'), $data);

        $response->assertSessionHasErrors('usia');
        $this->assertDatabaseCount('laporans', 0);
    }

    public function test_instansi_cannot_submit_report_with_non_numeric_age(): void
    {
        $user = $this->createInstansi();
        $prodi = $this->createProdi();

        $data = $this->validReportData($prodi->id);
        $data['usia'] = 'dua puluh';

        $response = $this->actingAs($user)
            ->post(route('laporan.store'), $data);

        $response->assertSessionHasErrors('usia');
        $this->assertDatabaseCount('laporans', 0);
    }

    public function test_instansi_cannot_submit_report_with_future_incident_date(): void
    {
        $user = $this->createInstansi();
        $prodi = $this->createProdi();

        $data = $this->validReportData($prodi->id);
        $data['tanggal_kejadian'] = now()->addDay()->toDateString();

        $response = $this->actingAs($user)
            ->post(route('laporan.store'), $data);

        $response->assertSessionHasErrors('tanggal_kejadian');
        $this->assertDatabaseCount('laporans', 0);
    }

    public function test_instansi_cannot_submit_report_with_invalid_gender(): void
    {
        $user = $this->createInstansi();
        $prodi = $this->createProdi();

        $data = $this->validReportData($prodi->id);
        $data['gender'] = 'X';

        $response = $this->actingAs($user)
            ->post(route('laporan.store'), $data);

        $response->assertSessionHasErrors('gender');
        $this->assertDatabaseCount('laporans', 0);
    }
}
