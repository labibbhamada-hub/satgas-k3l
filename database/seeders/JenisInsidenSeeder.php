<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JenisInsidenSeeder extends Seeder
{
    public function run(): void
    {
        $jenis_insidens = [
            [
                'nama' => 'Terkena benda tajam'
            ],
            [
                'nama' => 'Paparan radiasi / toksik'
            ],
            [
                'nama' => 'Tumpahan / paparan B3'
            ],
            [
                'nama' => 'Tersengat listrik'
            ],
            [
                'nama' => 'Terpleset / terjatuh'
            ],
            [
                'nama' => 'Cedera akibat alat kerja',
            ],
        ];

        foreach ($jenis_insidens as $jenis_insiden) {
            \App\Models\JenisInsiden::create($jenis_insiden);
        }
    }
}
