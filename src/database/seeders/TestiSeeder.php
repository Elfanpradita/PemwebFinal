<?php

namespace Database\Seeders;

use App\Models\Testi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testi::create([
            'name' => 'Elfan Pradita Rusmin',
            'profession' => 'Pengusaha',
            'image' => 'suki/img/testimonial-1.jpg',
            'content' =>'Bagus banget, saya suka sekali dengan website ini. Desainnya menarik dan mudah digunakan. Saya sangat merekomendasikan untuk orang lain.',
        ]);

        Testi::create([
            'name' => 'Ilhan Sheva Renggafiarto',
            'profession' => 'Perantau',
            'image' => 'suki/img/testimonial-2.jpg',
            'content' =>'Bagus banget, saya suka sekali dengan website ini. Desainnya menarik dan mudah digunakan. Saya sangat merekomendasikan untuk orang lain.',
        ]);

        Testi::create([
            'name' => 'Nahkwah Alfikri',
            'profession' => 'Penyanyi',
            'image' => 'suki/img/testimonial-3.jpg',
            'content' =>'Bagus banget, saya suka sekali dengan website ini. Desainnya menarik dan mudah digunakan. Saya sangat merekomendasikan untuk orang lain.',
        ]);
    }
}
