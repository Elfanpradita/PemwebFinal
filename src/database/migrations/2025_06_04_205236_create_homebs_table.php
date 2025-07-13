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
        Schema::create('homebs', function (Blueprint $table) {
            $table->id();
            $table->string('icon1')->nullable();
            $table->string('isi1')->nullable();
            $table->string('desc1')->nullable();
            $table->string('icon2')->nullable();
            $table->string('isi2')->nullable();
            $table->string('desc2')->nullable();
            $table->string('icon3')->nullable();
            $table->string('isi3')->nullable();
            $table->string('desc3')->nullable();
            $table->string('icon4')->nullable();
            $table->string('isi4')->nullable();
            $table->string('desc4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homebs');
    }
};
