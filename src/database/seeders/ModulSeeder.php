<?php

namespace Database\Seeders;

use App\Models\Modul;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Mengosongkan tabel untuk menghindari duplikasi
        Modul::query()->delete();

        // --- Modul untuk Kegiatan ID 1 (English Sesi 1: Introduction) ---
        for ($i = 1; $i <= 5; $i++) {
            Modul::create([
                'kegiatan_id' => 1,
                'title' => "Modul Sesi 1.$i: Basic English Greetings",
                'upload_modul' => "moduls/inggris/sesi_1_modul_$i.pdf",
            ]);
        }

        // --- Modul untuk Kegiatan ID 2 (English Sesi 2: Simple Tenses) ---
        for ($i = 1; $i <= 5; $i++) {
            Modul::create([
                'kegiatan_id' => 2,
                'title' => "Modul Sesi 2.$i: Understanding Simple Tenses",
                'upload_modul' => "moduls/inggris/sesi_2_modul_$i.pdf",
            ]);
        }

        // --- Modul untuk Kegiatan ID 3 (Japanese Sesi 1: Kana) ---
        for ($i = 1; $i <= 5; $i++) {
            Modul::create([
                'kegiatan_id' => 3,
                'title' => "Modul Sesi 1.$i: Learning Hiragana & Katakana",
                'upload_modul' => "moduls/jepang/sesi_1_modul_$i.pdf",
            ]);
        }

        // --- Modul untuk Kegiatan ID 4 (Japanese Sesi 2: Jikoshoukai) ---
        for ($i = 1; $i <= 5; $i++) {
            Modul::create([
                'kegiatan_id' => 4,
                'title' => "Modul Sesi 2.$i: Self-Introduction (Jikoshoukai)",
                'upload_modul' => "moduls/jepang/sesi_2_modul_$i.pdf",
            ]);
        }
    }
}
