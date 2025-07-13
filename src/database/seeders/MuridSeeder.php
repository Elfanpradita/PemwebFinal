<?php

namespace Database\Seeders;

use App\Models\Murid;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Mengosongkan tabel untuk menghindari duplikasi
        Murid::query()->delete();

        // Data untuk Murid 1: Chrisella Natasia
        Murid::create([
            'user_id' => 6,
            'nama_lengkap' => 'Chrisella Natasia',
            'no_telepon' => '081211112222',
            'umur' => 20,
            'tempat_tanggal_lahir' => 'Jakarta, 10 Januari 2005',
            'alamat' => 'Jl. Merdeka No. 1, Jakarta Pusat',
            'jenjang_pendidikan' => 'Mahasiswa',
        ]);

        // Data untuk Murid 2: Anisah SR (dari user "Pelajar")
        Murid::create([
            'user_id' => 11,
            'nama_lengkap' => 'Anisah SR',
            'no_telepon' => '087833334444',
            'umur' => 17,
            'tempat_tanggal_lahir' => 'Tangerang, 5 Mei 2008',
            'alamat' => 'Jl. Pelajar No. 2, Tangerang',
            'jenjang_pendidikan' => 'SMA',
        ]);

        // Data untuk Murid 3: Elfan Padita Rusmin
        Murid::create([
            'user_id' => 14,
            'nama_lengkap' => 'Elfan Padita Rusmin',
            'no_telepon' => '089955556666',
            'umur' => 19,
            'tempat_tanggal_lahir' => 'Bekasi, 12 Juni 2006',
            'alamat' => 'Jl. Patriot No. 3, Bekasi',
            'jenjang_pendidikan' => 'Mahasiswa',
        ]);
    }
}
