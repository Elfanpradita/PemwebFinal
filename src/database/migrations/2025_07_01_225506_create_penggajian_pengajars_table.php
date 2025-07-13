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
        Schema::create('penggajian_pengajars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gaji_pengajar_id')->constrained('gaji_pengajars')->onDelete('cascade');
            $table->foreignId('pengajar_id')->constrained('pengajars')->onDelete('cascade');
            $table->date('periode_awal');
            $table->date('periode_akhir');
            $table->string('total_pertemuan');
            $table->string('total_gaji');
            $table->date('tanggal_transfer')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('status')->default('pending')->nullable(); // pending, approved, rejected
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggajian_pengajars');
    }
};
