<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gaji_pengajars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_course_id')->constrained('event_courses')->onDelete('cascade');
            $table->string('gaji_pokok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gaji_pengajars');
    }
};
