<?php

namespace Database\Seeders;

use App\Models\Homea;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Homea::create([
            'slogan' => 'Selamat Datang di EUAcademy',
            'judul' => 'Belajar Bahasa Inggris dan Jepang Lebih Mudah',
            'desc' => 'EUAcademy menyediakan kursus interaktif dan fleksibel untuk membantumu menguasai bahasa Inggris dan Jepang dengan percaya diri.',
            'slogan2' => 'Kursus Populer',
            'judul2' => 'Bahasa Inggris & Bahasa Jepang',
            'desc2' => 'Pilih kursus sesuai kebutuhanmu, dari level dasar hingga mahir. Dipandu oleh pengajar berpengalaman dan materi yang terstruktur.',
            'image' => '/suki/img/about.jpg',
            'image1' => '/suki/img/carousel-1.jpg',
            'image2' => '/suki/img/carousel-2.jpg',
        ]);
    }
}
