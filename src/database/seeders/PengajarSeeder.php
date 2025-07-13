<?php

namespace Database\Seeders;

use App\Models\Pengajar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Mengosongkan tabel untuk menghindari duplikasi data
        Pengajar::query()->delete();

        // Data untuk Pengajar Bahasa Inggris
        Pengajar::create([
            'user_id' => 4,                 // Sesuaikan dengan user_id Johny Christian
            'departemen_id' => 4,           // Sesuaikan dengan id Departemen Pengajar
            'no_telepon' => '085678901234',
            'jenjang_pendidikan' => 'S1 Sastra Inggris',
            'bidang_ajar' => 'Bahasa Inggris',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. British No. 1, Jakarta',
        ]);

        // Data untuk Pengajar Bahasa Jepang
        Pengajar::create([
            'user_id' => 5,                 // Sesuaikan dengan user_id Yukimura Takuro
            'departemen_id' => 4,           // Sesuaikan dengan id Departemen Pengajar
            'no_telepon' => '087712345678',
            'jenjang_pendidikan' => 'S1 Sastra Jepang',
            'bidang_ajar' => 'Bahasa Jepang',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Sakura No. 2, Tangerang',
        ]);
    }
}
