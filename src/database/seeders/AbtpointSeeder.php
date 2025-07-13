<?php

namespace Database\Seeders;

use App\Models\Abtpoint;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AbtpointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $points = [
            'Menyediakan kursus bahasa Inggris dan Jepang berkualitas',
            'Pengajar berpengalaman dan profesional',
            'Metode pembelajaran fleksibel dan interaktif',
            'Visi: Menjadi pusat pembelajaran bahasa asing terbaik di Indonesia',
            'Misi: Membantu peserta menguasai bahasa asing dengan percaya diri',
            'Telah meluluskan lebih dari 1000 peserta dengan sertifikasi resmi',
        ];

        foreach ($points as $point) {
            Abtpoint::create([
                'point' => $point,
            ]);
        }
    }
}
