<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'title' => 'Kursus Bahasa Inggris Dasar',
            'price' => 120.00,
            'image' => 'suki/img/course-1.jpg',
            'instructor' => 'Ms. Ayu Lestari',
            'duration' => '2.00 Hrs',
            'students' => 40,
            'rating' => 4.9,
            'reviews' => 105,
        ]);

        Course::create([
            'title' => 'Bahasa Jepang untuk Pemula',
            'price' => 130.00,
            'image' => 'suki/img/course-2.jpg',
            'instructor' => 'Mr. Hiro Tanaka',
            'duration' => '2.30 Hrs',
            'students' => 50,
            'rating' => 4.8,
            'reviews' => 92,
        ]);

        Course::create([
            'title' => 'Speaking & Conversation Bahasa Inggris',
            'price' => 150.00,
            'image' => 'suki/img/course-3.jpg',
            'instructor' => 'Ms. Sarah Nuraini',
            'duration' => '1.45 Hrs',
            'students' => 65,
            'rating' => 5.0,
            'reviews' => 130,
        ]);
    }
}
