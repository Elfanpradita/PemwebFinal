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
        Schema::create('event_courses', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_event_course');
            $table->string('name');
            $table->string('description')->nullable();
            $table->date('start');
            $table->date('end');
            $table->string('price');
            $table->foreignId('pengajar_id')->constrained('pengajars')->onDelete('cascade');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_courses');
    }
};
