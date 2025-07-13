<?php

namespace Database\Seeders;

use App\Models\GajiPengajar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GajiPengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Mengosongkan tabel untuk menghindari duplikasi
        GajiPengajar::query()->delete();

        // Menetapkan skema gaji untuk Kursus Bahasa Inggris
        GajiPengajar::create([
            'event_course_id' => 1,   // Asumsi ID 1 untuk Kursus Inggris
            // Berdasarkan BRD, gaji adalah 500.000 per pertemuan.
            // Kolom ini mungkin lebih tepat dinamai 'gaji_per_pertemuan'.
            'gaji_pokok' => 500000,
        ]);

        // Menetapkan skema gaji untuk Kursus Bahasa Jepang
        GajiPengajar::create([
            'event_course_id' => 2,   // Asumsi ID 2 untuk Kursus Jepang
            'gaji_pokok' => 500000,
        ]);
    }
}
