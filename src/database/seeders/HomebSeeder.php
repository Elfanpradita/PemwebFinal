<?php

namespace Database\Seeders;

use App\Models\Homeb;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Hapus data lama jika ada untuk menghindari duplikasi
        Homeb::query()->delete();

        // Buat data baru untuk kursus bahasa
        Homeb::create([
            'icon1' => 'fa fa-3x fa-language text-primary mb-4',
            'isi1' => 'Kursus Bahasa Inggris',
            'desc1' => 'Mulai perjalanan Anda belajar bahasa Inggris dari dasar. Cocok untuk pemula yang ingin menguasai tata bahasa, kosakata, dan percakapan sehari-hari.',
            
            'icon2' => 'fa fa-3x fa-edit text-primary mb-4',
            'isi2' => 'English Writing',
            'desc2' => 'Asah kemampuan menulis Anda dalam bahasa Inggris, mulai dari menyusun esai, email formal, hingga tulisan kreatif untuk berbagai keperluan.',
            
            'icon3' => 'fa fa-3x fa-torii-gate text-primary mb-4',
            'isi3' => 'Kursus Bahasa Jepang',
            'desc3' => 'Pelajari dasar-dasar bahasa Jepang, termasuk pengenalan huruf Hiragana, Katakana, dan Kanji dasar, serta frasa penting untuk komunikasi.',
            
            'icon4' => 'fa fa-3x fa-pen-nib text-primary mb-4',
            'isi4' => 'Japanese Writing',
            'desc4' => 'Fokus pada latihan menulis kalimat dalam bahasa Jepang, penggunaan partikel, dan menyusun paragraf sederhana dengan benar dan efektif.',
        ]);
    }
}