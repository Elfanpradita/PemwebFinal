<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'title',
        'price',
        'image',
        'instructor',
        'duration',
        'students',
        'rating',
        'reviews',
    ];
}

            // $table->string('title'); // Judul kursus
            // $table->decimal('price', 8, 2); // Harga kursus
            // $table->string('image'); // Path gambar
            // $table->string('instructor'); // Nama pengajar
            // $table->string('duration'); // Durasi, misal "1.5 Hrs"
            // $table->unsignedInteger('students')->default(0); // Jumlah siswa
            // $table->float('rating', 2, 1)->default(5.0); // Rating dari 0-5 (misal 4.5)
            // $table->unsignedInteger('reviews')->default(0); // Jumlah review
