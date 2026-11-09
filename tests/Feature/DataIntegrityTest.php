<?php

namespace Tests\Feature;

use App\Models\Laporan;
use App\Models\LaporanFile;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DataIntegrityTest extends TestCase
{
    use RefreshDatabase;

    private function createUser(): User
    {
        return User::create([
            'nama' => 'Penanggung Jawab Test',
            'telp' => fake()->unique()->numerify('08##########'),
            'password' => 'PasswordLama123',
            'role' => 'instansi',
            'nama_instansi' => 'Instansi Test',
        ]);
    }

    private function createProdi(): Prodi
    {
        return Prodi::create([
            'nama' => 'Keperawatan',
            'fakultas' => 'fikes',
            'is_active' => true,
        ]);
    }

    private function createLaporan(User $user, Prodi $prodi): Laporan
    {
        return Laporan::create([
            'user_id' => $user->id,
            'nama_mahasiswa' => 'Mahasiswa Test',
            'prodi_id' => $prodi->id,
            'gender' => 'L',
            'usia' => '21',
            'tanggal_kejadian' => now()->toDateString(),
            'jam_kejadian' => '09:00:00',
            'lokasi_kejadian' => 'Laboratorium',
            'tingkat_keparahan' => '1',
            'jenis_insiden' => 'Kecelakaan Kerja',
            'kronologi' => 'Kronologi pengujian laporan.',
            'dampak' => 'Dampak pengujian.',
            'tindakan' => 'Tindakan pengujian.',
            'penanganan_oleh' => 'Petugas',
            'kejadian_serupa' => false,
            'tanggal_laporan' => now()->toDateString(),
            'status' => 'dikirim',
        ]);
    }

    public function test_user_with_reports_cannot_be_deleted(): void
    {
        $user = $this->createUser();
        $prodi = $this->createProdi();

        $laporan = $this->createLaporan($user, $prodi);

        $deletionBlocked = false;

        try {
            $user->delete();
        } catch (QueryException) {
            $deletionBlocked = true;
        }

        $this->assertTrue($deletionBlocked);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
        ]);

        $this->assertDatabaseHas('laporans', [
            'id' => $laporan->id,
            'user_id' => $user->id,
        ]);
    }

    public function test_prodi_with_reports_cannot_be_deleted(): void
    {
        $user = $this->createUser();
        $prodi = $this->createProdi();

        $laporan = $this->createLaporan($user, $prodi);

        $deletionBlocked = false;

        try {
            $prodi->delete();
        } catch (QueryException) {
            $deletionBlocked = true;
        }

        $this->assertTrue($deletionBlocked);

        $this->assertDatabaseHas('prodis', [
            'id' => $prodi->id,
        ]);

        $this->assertDatabaseHas('laporans', [
            'id' => $laporan->id,
            'prodi_id' => $prodi->id,
        ]);
    }

    public function test_deactivating_user_does_not_delete_historical_reports(): void
    {
        $user = $this->createUser();
        $prodi = $this->createProdi();

        $laporan = $this->createLaporan($user, $prodi);

        $user->forceFill([
            'is_active' => false,
        ])->save();

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'is_active' => false,
        ]);

        $this->assertDatabaseHas('laporans', [
            'id' => $laporan->id,
            'user_id' => $user->id,
        ]);
    }

    public function test_eloquent_relationships_are_working(): void
    {
        $user = $this->createUser();
        $prodi = $this->createProdi();

        $laporan = $this->createLaporan($user, $prodi);

        $file = LaporanFile::create([
            'laporan_id' => $laporan->id,
            'file_path' => 'laporan/test.pdf',
        ]);

        // User -> Laporan
        $this->assertTrue(
            $user->laporans()->whereKey($laporan->id)->exists()
        );

        // Laporan -> User
        $this->assertTrue(
            $laporan->user->is($user)
        );

        // Laporan -> Prodi
        $this->assertTrue(
            $laporan->prodi->is($prodi)
        );

        // Prodi -> Laporan
        $this->assertTrue(
            $prodi->laporans()->whereKey($laporan->id)->exists()
        );

        // Laporan -> LaporanFile
        $this->assertTrue(
            $laporan->files()->whereKey($file->id)->exists()
        );

        // LaporanFile -> Laporan
        $this->assertTrue(
            $file->laporan->is($laporan)
        );
    }

    public function test_deleting_report_cascades_to_laporan_file_records(): void
    {
        $user = $this->createUser();
        $prodi = $this->createProdi();

        $laporan = $this->createLaporan($user, $prodi);

        $file = LaporanFile::create([
            'laporan_id' => $laporan->id,
            'file_path' => 'laporan/test.pdf',
        ]);

        $laporan->delete();

        $this->assertDatabaseMissing('laporans', [
            'id' => $laporan->id,
        ]);

        $this->assertDatabaseMissing('laporan_files', [
            'id' => $file->id,
        ]);
    }
}
