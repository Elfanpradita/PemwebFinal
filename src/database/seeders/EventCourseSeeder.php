<?php

namespace Database\Seeders;

use App\Models\EventCourse;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class EventCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Mengosongkan tabel untuk menghindari duplikasi
        EventCourse::query()->delete();

        // Data untuk Kursus Bahasa Inggris
        EventCourse::create([
            'nomor_event_course' => 'EVT-ING-202508',
            'name' => 'Kursus Bahasa Inggris - Level Pemula',
            'description' => 'Kursus intensif selama 6 bulan untuk menguasai dasar-dasar tata bahasa, percakapan sehari-hari, dan persiapan tes TOEFL dasar.',
            'start' => Carbon::create(2025, 8, 1)->toDateString(),
            'end' => Carbon::create(2025, 8, 1)->addMonths(6)->endOfMonth()->toDateString(),
            'price' => 1500000,
            'pengajar_id' => 1, // Asumsi ID 1 untuk Johny Christian
            'employee_id' => 2, // Asumsi ID 2 untuk Citra Lestari (Akademik)
        ]);

        // Data untuk Kursus Bahasa Jepang
        EventCourse::create([
            'nomor_event_course' => 'EVT-JPN-202508',
            'name' => 'Kursus Bahasa Jepang - Level N5',
            'description' => 'Program belajar bahasa Jepang dari nol hingga setara level JLPT N5 selama 6 bulan. Materi mencakup Hiragana, Katakana, dan Kanji dasar.',
            'start' => Carbon::create(2025, 8, 1)->toDateString(),
            'end' => Carbon::create(2025, 8, 1)->addMonths(6)->endOfMonth()->toDateString(),
            'price' => 1750000,
            'pengajar_id' => 2, // Asumsi ID 2 untuk Yukimura Takuro
            'employee_id' => 2, // Asumsi ID 2 untuk Citra Lestari (Akademik)
        ]);
    }
}
