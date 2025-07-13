<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Mengosongkan tabel untuk menghindari duplikasi
        Task::query()->delete();

        // --- Tugas untuk Sesi Kursus Bahasa Inggris ---

        // Tugas untuk kegiatan_id: 1 (Sesi 1: Introduction & Basic Greetings)
        Task::create([
            'kegiatan_id' => 1,
            'title' => 'Quiz 1: Introduce Yourself',
            'description' => 'Buatlah sebuah paragraf singkat untuk memperkenalkan diri Anda dalam Bahasa Inggris. Sebutkan nama, asal, dan hobi Anda.',
        ]);

        // Tugas untuk kegiatan_id: 2 (Sesi 2: Simple Tenses)
        Task::create([
            'kegiatan_id' => 2,
            'title' => 'Quiz 2: Simple Tenses Practice',
            'description' => 'Buatlah masing-masing 3 kalimat menggunakan Simple Present Tense, Simple Past Tense, dan Simple Future Tense.',
        ]);

        // --- Tugas untuk Sesi Kursus Bahasa Jepang ---

        // Tugas untuk kegiatan_id: 3 (Sesi 1: Pengenalan Hiragana & Katakana)
        Task::create([
            'kegiatan_id' => 3,
            'title' => 'Quiz 1: Menulis Kana',
            'description' => 'Tuliskan nama lengkap Anda menggunakan huruf Katakana. Kemudian, tulis 5 nama buah dalam Bahasa Jepang menggunakan Hiragana.',
        ]);

        // Tugas untuk kegiatan_id: 4 (Sesi 2: Aisatsu & Jikoshoukai)
        Task::create([
            'kegiatan_id' => 4,
            'title' => 'Quiz 2: Dialog Perkenalan',
            'description' => 'Buatlah sebuah dialog perkenalan singkat antara dua orang (A dan B) menggunakan salam sapaan dan frasa perkenalan diri yang telah dipelajari.',
        ]);
    }
}

