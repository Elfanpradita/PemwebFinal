<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul kursus
            $table->decimal('price', 8, 2); // Harga kursus
            $table->string('image'); // Path gambar
            $table->string('instructor'); // Nama pengajar
            $table->string('duration'); // Durasi, misal "1.5 Hrs"
            $table->unsignedInteger('students')->default(0); // Jumlah siswa
            $table->float('rating', 2, 1)->default(5.0); // Rating dari 0-5 (misal 4.5)
            $table->unsignedInteger('reviews')->default(0); // Jumlah review
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
