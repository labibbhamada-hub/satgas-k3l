<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    public function run(): void
    {
        $prodis = [
            [
                'nama' => 'Profesi Ners',
                'fakultas' => 'fikes',
            ],
            [
                'nama' => 'Profesi Apoteker',
                'fakultas' => 'fikes',
            ],
            [
                'nama' => 'Profesi Kebidanan',
                'fakultas' => 'fikes',
            ],
            [
                'nama' => 'S1 Ilmu Keperawatan',
                'fakultas' => 'fikes',
            ],
            [
                'nama' => 'S1 Farmasi',
                'fakultas' => 'fikes',
            ],
            [
                'nama' => 'S1 Kebidanan',
                'fakultas' => 'fikes',
            ],
            [
                'nama' => 'S1 Psikologi',
                'fakultas' => 'fikes',
            ],
            [
                'nama' => 'D4 Keselamatan dan Kesehatan Kerja',
                'fakultas' => 'fikes',
            ],
            [
                'nama' => 'D3 Kebidanan',
                'fakultas' => 'fikes',
            ],
            [
                'nama' => 'D3 Keperawatan',
                'fakultas' => 'fikes',
            ],
            [
                'nama' => 'S1 Informatika',
                'fakultas' => 'fbst',
            ],
            [
                'nama' => 'S1 Bisnis Digital',
                'fakultas' => 'fbst',
            ],
            [
                'nama' => 'S1 Kewirausahaan',
                'fakultas' => 'fbst',
            ],
            [
                'nama' => 'S1 Manajemen',
                'fakultas' => 'fbst',
            ],
            [
                'nama' => 'S1 Pendidikan Guru Sekolah Dasar',
                'fakultas' => 'fph',
            ],
            [
                'nama' => 'S1 Pendidikan Jasmasi',
                'fakultas' => 'fph',
            ],
            [
                'nama' => 'S1 Hukum',
                'fakultas' => 'fph',
            ],
        ];

        foreach ($prodis as $prodi) {
            \App\Models\Prodi::create($prodi);
        }
    }
}
