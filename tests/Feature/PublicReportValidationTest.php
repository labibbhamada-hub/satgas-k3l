<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicReportValidationTest extends TestCase
{
    use RefreshDatabase;

    private function validAreaKampusData(): array
    {
        return [
            'pelapor_nama' => 'Pelapor Test',
            'pelapor_bagian' => 'Laboratorium',
            'korban_nama' => 'Korban Test',
            'korban_bagian' => 'Laboratorium',
            'kejadian_tanggal' => now()->toDateString(),
            'kejadian_jam' => '09:00',
            'kejadian_lokasi' => 'Gedung A',
            'kejadian_jenis' => 'Terkena benda tajam',
            'kejadian_jenis_lainnya' => '',
            'kejadian_kronologi' => 'Kronologi pengujian.',
            'kejadian_dampak' => 'Dampak pengujian.',
            'penanganan_tindakan' => 'Tindakan pengujian.',
            'penanganan_oleh' => 'Petugas',
            'is_pernah' => '0',
        ];
    }

    private function validPraktikLainnyaData(): array
    {
        return array_merge($this->validAreaKampusData(), [
            'kejadian_tempat' => 'Lokasi Praktik',
        ]);
    }

    public function test_area_kampus_can_submit_valid_report(): void
    {
        $response = $this->post(
            route('area-kampus.store'),
            $this->validAreaKampusData()
        );

        $response->assertRedirect(
            route('buat-laporan.area-kampus.success')
        );

        $this->assertDatabaseHas('laporan_area_kampuses', [
            'pelapor_nama' => 'Pelapor Test',
            'kejadian_jenis' => 'Terkena benda tajam',
            'status' => 'dikirim',
        ]);
    }

    public function test_area_kampus_cannot_submit_future_incident_date(): void
    {
        $data = $this->validAreaKampusData();
        $data['kejadian_tanggal'] = now()->addDay()->toDateString();

        $response = $this->post(
            route('area-kampus.store'),
            $data
        );

        $response->assertSessionHasErrors('kejadian_tanggal');

        $this->assertDatabaseCount('laporan_area_kampuses', 0);
    }

    public function test_area_kampus_cannot_submit_invalid_incident_type(): void
    {
        $data = $this->validAreaKampusData();
        $data['kejadian_jenis'] = 'Jenis Tidak Valid';

        $response = $this->post(
            route('area-kampus.store'),
            $data
        );

        $response->assertSessionHasErrors('kejadian_jenis');

        $this->assertDatabaseCount('laporan_area_kampuses', 0);
    }

    public function test_area_kampus_requires_description_for_other_incident_type(): void
    {
        $data = $this->validAreaKampusData();
        $data['kejadian_jenis'] = 'Lainnya';
        $data['kejadian_jenis_lainnya'] = '';

        $response = $this->post(
            route('area-kampus.store'),
            $data
        );

        $response->assertSessionHasErrors('kejadian_jenis_lainnya');

        $this->assertDatabaseCount('laporan_area_kampuses', 0);
    }

    public function test_area_kampus_can_submit_other_incident_type_with_description(): void
    {
        $data = $this->validAreaKampusData();
        $data['kejadian_jenis'] = 'Lainnya';
        $data['kejadian_jenis_lainnya'] = 'Insiden pengujian lainnya';

        $response = $this->post(
            route('area-kampus.store'),
            $data
        );

        $response->assertRedirect(
            route('buat-laporan.area-kampus.success')
        );

        $this->assertDatabaseHas('laporan_area_kampuses', [
            'kejadian_jenis' => 'Insiden pengujian lainnya',
        ]);
    }

    public function test_praktik_lainnya_can_submit_valid_report(): void
    {
        $response = $this->post(
            route('praktik-lainnya.store'),
            $this->validPraktikLainnyaData()
        );

        $response->assertRedirect(
            route('buat-laporan.praktik-lainnya.success')
        );

        $this->assertDatabaseHas('laporan_praktik_lainnyas', [
            'pelapor_nama' => 'Pelapor Test',
            'kejadian_tempat' => 'Lokasi Praktik',
            'status' => 'dikirim',
        ]);
    }

    public function test_praktik_lainnya_cannot_submit_future_incident_date(): void
    {
        $data = $this->validPraktikLainnyaData();
        $data['kejadian_tanggal'] = now()->addDay()->toDateString();

        $response = $this->post(
            route('praktik-lainnya.store'),
            $data
        );

        $response->assertSessionHasErrors('kejadian_tanggal');

        $this->assertDatabaseCount('laporan_praktik_lainnyas', 0);
    }

    public function test_praktik_lainnya_cannot_submit_invalid_incident_type(): void
    {
        $data = $this->validPraktikLainnyaData();
        $data['kejadian_jenis'] = 'Jenis Tidak Valid';

        $response = $this->post(
            route('praktik-lainnya.store'),
            $data
        );

        $response->assertSessionHasErrors('kejadian_jenis');

        $this->assertDatabaseCount('laporan_praktik_lainnyas', 0);
    }

    public function test_praktik_lainnya_requires_description_for_other_incident_type(): void
    {
        $data = $this->validPraktikLainnyaData();
        $data['kejadian_jenis'] = 'Lainnya';
        $data['kejadian_jenis_lainnya'] = '';

        $response = $this->post(
            route('praktik-lainnya.store'),
            $data
        );

        $response->assertSessionHasErrors('kejadian_jenis_lainnya');

        $this->assertDatabaseCount('laporan_praktik_lainnyas', 0);
    }

    public function test_praktik_lainnya_can_submit_other_incident_type_with_description(): void
    {
        $data = $this->validPraktikLainnyaData();
        $data['kejadian_jenis'] = 'Lainnya';
        $data['kejadian_jenis_lainnya'] = 'Insiden praktik lainnya';

        $response = $this->post(
            route('praktik-lainnya.store'),
            $data
        );

        $response->assertRedirect(
            route('buat-laporan.praktik-lainnya.success')
        );

        $this->assertDatabaseHas('laporan_praktik_lainnyas', [
            'kejadian_jenis' => 'Insiden praktik lainnya',
        ]);
    }
}
