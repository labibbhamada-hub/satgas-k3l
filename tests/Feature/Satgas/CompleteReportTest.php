<?php

namespace Tests\Feature\Satgas;

use App\Models\Laporan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CompleteReportTest extends TestCase
{
    use RefreshDatabase;

    private function createSatgas(): User
    {
        return User::create([
            'nama' => 'Satgas Test',
            'telp' => '081234567890',
            'password' => 'Password123',
            'role' => 'satgas',
            'nama_instansi' => '-',
        ]);
    }

    private function createLaporan(
        User $user,
        string $status = 'diverifikasi'
    ): Laporan {
        $prodiId = DB::table('prodis')->insertGetId([
            'nama' => 'Keperawatan',
            'fakultas' => 'fikes',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return Laporan::create([
            'user_id' => $user->id,
            'nama_mahasiswa' => 'Mahasiswa Test',
            'prodi_id' => $prodiId,
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
            'tanggal_verifikasi' => $status === 'diverifikasi'
                ? now()->toDateString()
                : null,
            'tanggal_selesai' => null,
            'status' => $status,
        ]);
    }

    /**
     * GET tidak boleh menjalankan operasi penyelesaian laporan.
     */
    public function test_get_request_cannot_complete_report(): void
    {
        $satgas = $this->createSatgas();
        $laporan = $this->createLaporan($satgas);

        $response = $this->actingAs($satgas)
            ->get("/satgas/instansi/selesaikan/{$laporan->id}");

        $response->assertStatus(405);

        $this->assertDatabaseHas('laporans', [
            'id' => $laporan->id,
            'status' => 'diverifikasi',
            'tanggal_selesai' => null,
        ]);
    }

    /**
     * Satgas dapat menyelesaikan laporan yang sudah diverifikasi.
     */
    public function test_satgas_can_complete_verified_report(): void
    {
        $satgas = $this->createSatgas();
        $laporan = $this->createLaporan($satgas, 'diverifikasi');

        $response = $this->actingAs($satgas)
            ->post(route('instansi.selesaikan', $laporan->id));

        $response->assertRedirect('satgas/laporan-nsi');
        $response->assertSessionHas('success');

        $laporan->refresh();

        $this->assertSame('selesai', $laporan->status);
        $this->assertNotNull($laporan->tanggal_selesai);
    }

    /**
     * Laporan yang bukan berstatus diverifikasi tidak boleh diselesaikan.
     */
    public function test_report_with_invalid_status_cannot_be_completed(): void
    {
        $satgas = $this->createSatgas();

        foreach (['dikirim', 'ditolak', 'selesai'] as $status) {
            $laporan = $this->createLaporan($satgas, $status);

            $response = $this->actingAs($satgas)
                ->from('/satgas/laporan-nsi')
                ->post(route('instansi.selesaikan', $laporan->id));

            $response->assertRedirect('/satgas/laporan-nsi');
            $response->assertSessionHas('error');

            $laporan->refresh();

            $this->assertSame($status, $laporan->status);
            $this->assertNull($laporan->tanggal_selesai);
        }
    }

    /**
     * ID laporan yang tidak ditemukan tidak boleh mengubah data.
     */
    public function test_nonexistent_report_cannot_be_completed(): void
    {
        $satgas = $this->createSatgas();

        $response = $this->actingAs($satgas)
            ->from('/satgas/laporan-nsi')
            ->post(route('instansi.selesaikan', 999999));

        $response->assertRedirect('/satgas/laporan-nsi');
        $response->assertSessionHas('error');
    }

    /**
     * Satgas dapat memverifikasi laporan yang masih berstatus dikirim.
     */
    public function test_satgas_can_verify_submitted_report(): void
    {
        $satgas = $this->createSatgas();
        $laporan = $this->createLaporan($satgas, 'dikirim');

        $response = $this->actingAs($satgas)
            ->put(route('laporan-nsi.update', $laporan->id), [
                'catatan_verifikasi' => 'Laporan telah diperiksa dan diverifikasi.',
            ]);

        $response->assertRedirect('satgas/laporan-nsi');
        $response->assertSessionHas('success');

        $laporan->refresh();

        $this->assertSame('diverifikasi', $laporan->status);
        $this->assertSame(
            'Laporan telah diperiksa dan diverifikasi.',
            $laporan->catatan_verifikasi
        );
        $this->assertNotNull($laporan->tanggal_verifikasi);
    }

    /**
     * Laporan yang sudah diproses tidak boleh diverifikasi ulang.
     */
    public function test_report_with_invalid_status_cannot_be_verified_again(): void
    {
        $satgas = $this->createSatgas();

        foreach (['diverifikasi', 'ditolak', 'selesai'] as $status) {
            $laporan = $this->createLaporan($satgas, $status);

            $originalTanggalVerifikasi = $laporan->tanggal_verifikasi;

            $response = $this->actingAs($satgas)
                ->from('/satgas/laporan-nsi')
                ->put(route('laporan-nsi.update', $laporan->id), [
                    'catatan_verifikasi' => 'Percobaan verifikasi ulang.',
                ]);

            $response->assertRedirect('/satgas/laporan-nsi');
            $response->assertSessionHas('error');

            $laporan->refresh();

            $this->assertSame($status, $laporan->status);

            $this->assertEquals(
                $originalTanggalVerifikasi,
                $laporan->tanggal_verifikasi
            );

            $this->assertNull($laporan->catatan_verifikasi);
        }
    }

    /**
     * ID laporan yang tidak ditemukan tidak boleh mengubah data.
     */
    public function test_nonexistent_report_cannot_be_verified(): void
    {
        $satgas = $this->createSatgas();

        $response = $this->actingAs($satgas)
            ->from('/satgas/laporan-nsi')
            ->put(route('laporan-nsi.update', 999999), [
                'catatan_verifikasi' => 'Percobaan verifikasi.',
            ]);

        $response->assertRedirect('/satgas/laporan-nsi');
        $response->assertSessionHas('error');
    }
}
