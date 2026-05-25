<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'nama' => 'Developer',
                'telp' => '08000',
                'password' => bcrypt('bhamada'),
                'role' => 'dev',
                'nama_instansi' => 'IT Bhamada',
            ],
            [
                'nama' => 'Satgas K3L',
                'telp' => '08111',
                'password' => bcrypt('bhamada'),
                'role' => 'satgas',
                'nama_instansi' => 'Universitas Bhamada Slawi',
            ],
            [
                'nama' => 'A',
                'telp' => '08222',
                'password' => bcrypt('bhamada'),
                'role' => 'instansi',
                'nama_instansi' => 'RSUD dr. Soeselo Slawi',
            ],
            [
                'nama' => 'B',
                'telp' => '08333',
                'password' => bcrypt('bhamada'),
                'role' => 'instansi',
                'nama_instansi' => 'RSUD Kardinah Tegal',
            ],
            [
                'nama' => 'C',
                'telp' => '08444',
                'password' => bcrypt('bhamada'),
                'role' => 'instansi',
                'nama_instansi' => 'RSU PKU Muhammadiyah Tegal',
            ],
            [
                'nama' => 'D',
                'telp' => '08555',
                'password' => bcrypt('bhamada'),
                'role' => 'instansi',
                'nama_instansi' => 'RS Hawari Essa Lebaksiu',
            ],
            [
                'nama' => 'E',
                'telp' => '08666',
                'password' => bcrypt('bhamada'),
                'role' => 'instansi',
                'nama_instansi' => 'RS Harapan Sehat Slawi',
            ],
            [
                'nama' => 'F',
                'telp' => '08777',
                'password' => bcrypt('bhamada'),
                'role' => 'instansi',
                'nama_instansi' => 'RS Mitra Siaga Kramat',
            ],
            [
                'nama' => 'G',
                'telp' => '08888',
                'password' => bcrypt('bhamada'),
                'role' => 'instansi',
                'nama_instansi' => 'RSD Gunung Jati Cirebon',
            ],
            [
                'nama' => 'H',
                'telp' => '08999',
                'password' => bcrypt('bhamada'),
                'role' => 'instansi',
                'nama_instansi' => 'RSUD Brebes',
            ],
            [
                'nama' => 'I',
                'telp' => '08101010',
                'password' => bcrypt('bhamada'),
                'role' => 'instansi',
                'nama_instansi' => 'RSUD dr. M. Ashari Pemalang',
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
