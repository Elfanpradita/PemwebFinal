<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Mengosongkan tabel untuk menghindari duplikasi data
        Kegiatan::query()->delete();

        // Mendefinisikan tanggal mulai kursus sebagai acuan
        $courseStartDate = Carbon::create(2025, 8, 1);

        // --- Kegiatan untuk Kursus Bahasa Inggris (event_course_id: 1, pengajar_id: 1) ---
        
        // Sesi 1: Senin, 4 Agustus 2025
        $sesi1Inggris = $courseStartDate->copy()->next(Carbon::MONDAY);
        Kegiatan::create([
            'pengajar_id' => 1,
            'event_course_id' => 1,
            'nama' => 'Sesi 1: Introduction & Basic Greetings',
            'tanggal' => $sesi1Inggris->toDateString(),
            'start' => '10:00:00', // PERBAIKAN: Gunakan format TIME
            'end' => '12:00:00',   // PERBAIKAN: Gunakan format TIME
        ]);

        // Sesi 2: Kamis, 7 Agustus 2025
        $sesi2Inggris = $sesi1Inggris->copy()->next(Carbon::THURSDAY);
        Kegiatan::create([
            'pengajar_id' => 1,
            'event_course_id' => 1,
            'nama' => 'Sesi 2: Simple Tenses (Present, Past, Future)',
            'tanggal' => $sesi2Inggris->toDateString(),
            'start' => '10:00:00', // PERBAIKAN: Gunakan format TIME
            'end' => '12:00:00',   // PERBAIKAN: Gunakan format TIME
        ]);

        // --- Kegiatan untuk Kursus Bahasa Jepang (event_course_id: 2, pengajar_id: 2) ---
        
        // Sesi 1: Senin, 4 Agustus 2025
        $sesi1Jepang = $courseStartDate->copy()->next(Carbon::MONDAY);
        Kegiatan::create([
            'pengajar_id' => 2,
            'event_course_id' => 2,
            'nama' => 'Sesi 1: Pengenalan Hiragana & Katakana',
            'tanggal' => $sesi1Jepang->toDateString(),
            'start' => '10:00:00', // PERBAIKAN: Gunakan format TIME
            'end' => '12:00:00',   // PERBAIKAN: Gunakan format TIME
        ]);

        // Sesi 2: Kamis, 7 Agustus 2025
        $sesi2Jepang = $sesi1Jepang->copy()->next(Carbon::THURSDAY);
        Kegiatan::create([
            'pengajar_id' => 2,
            'event_course_id' => 2,
            'nama' => 'Sesi 2: Salam Sapaan (Aisatsu) & Perkenalan Diri (Jikoshoukai)',
            'tanggal' => $sesi2Jepang->toDateString(),
            'start' => '10:00:00', // PERBAIKAN: Gunakan format TIME
            'end' => '12:00:00',   // PERBAIKAN: Gunakan format TIME
        ]);
    }
}
