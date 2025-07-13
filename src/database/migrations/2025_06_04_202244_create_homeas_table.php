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
        Schema::create('homeas', function (Blueprint $table) {
            $table->id();
            $table->string('slogan')->nullable();
            $table->string('judul')->nullable();
            $table->string('desc')->nullable();
            $table->string('slogan2')->nullable();
            $table->string('judul2')->nullable();
            $table->string('desc2')->nullable();
            $table->string('image')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homeas');
    }
};
