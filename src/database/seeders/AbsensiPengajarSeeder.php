<?php

namespace Database\Seeders;

use App\Models\AbsensiPengajar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AbsensiPengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Mengosongkan tabel untuk menghindari duplikasi
        AbsensiPengajar::query()->delete();

        // Data absensi untuk Pengajar ID 1 (Johny Christian - Inggris)
        AbsensiPengajar::create([
            'event_course_id' => 1, // Kursus Inggris
            'kegiatan_id' => 1,     // Sesi 1 Inggris
            'pengajar_id' => 1,
            'status' => 'hadir',
            'keterangan' => 'Mengajar sesuai jadwal.',
        ]);
        AbsensiPengajar::create([
            'event_course_id' => 1, // Kursus Inggris
            'kegiatan_id' => 2,     // Sesi 2 Inggris
            'pengajar_id' => 1,
            'status' => 'hadir',
            'keterangan' => 'Mengajar sesuai jadwal.',
        ]);

        // Data absensi untuk Pengajar ID 2 (Yukimura Takuro - Jepang)
        AbsensiPengajar::create([
            'event_course_id' => 2, // Kursus Jepang
            'kegiatan_id' => 3,     // Sesi 1 Jepang
            'pengajar_id' => 2,
            'status' => 'hadir',
            'keterangan' => 'Mengajar sesuai jadwal.',
        ]);
        AbsensiPengajar::create([
            'event_course_id' => 2, // Kursus Jepang
            'kegiatan_id' => 4,     // Sesi 2 Jepang
            'pengajar_id' => 2,
            'status' => 'hadir',
            'keterangan' => 'Digantikan oleh pengajar lain karena sakit.',
        ]);
    }
}
