<?php

namespace Database\Seeders;

use App\Models\Penggajian;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class PenggajianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Mengosongkan tabel untuk menghindari duplikasi data
        Penggajian::query()->delete();

        // --- Gaji Bulan Juni 2025 ---
        $periodeJuni = Carbon::create(2025, 6);

        // Gaji untuk Budi Santoso (Administrasi)
        Penggajian::create([
            'employee_id' => 1, // Asumsi ID 1 untuk Budi Santoso
            'periode_awal' => $periodeJuni->startOfMonth()->toDateString(),
            'periode_akhir' => $periodeJuni->endOfMonth()->toDateString(),
            'total_gaji' => 5000000, // Sebaiknya dalam bentuk integer
            'tanggal_transfer' => $periodeJuni->addMonth()->startOfMonth()->toDateString(),
            'keterangan' => 'Gaji bulan Juni 2025 untuk Budi Santoso.',
            'status' => 'dibayar',
        ]);

        // Gaji untuk Citra Lestari (Akademik)
        Penggajian::create([
            'employee_id' => 2, // Asumsi ID 2 untuk Citra Lestari
            'periode_awal' => $periodeJuni->startOfMonth()->toDateString(),
            'periode_akhir' => $periodeJuni->endOfMonth()->toDateString(),
            'total_gaji' => 5000000,
            'tanggal_transfer' => $periodeJuni->addMonth()->startOfMonth()->toDateString(),
            'keterangan' => 'Gaji bulan Juni 2025 untuk Citra Lestari.',
            'status' => 'dibayar',
        ]);

        // --- Gaji Bulan Mei 2025 ---
        $periodeMei = Carbon::create(2025, 5);

        // Gaji untuk Budi Santoso
        Penggajian::create([
            'employee_id' => 1,
            'periode_awal' => $periodeMei->startOfMonth()->toDateString(),
            'periode_akhir' => $periodeMei->endOfMonth()->toDateString(),
            'total_gaji' => 5000000,
            'tanggal_transfer' => $periodeMei->addMonth()->startOfMonth()->toDateString(),
            'keterangan' => 'Gaji bulan Mei 2025 untuk Budi Santoso.',
            'status' => 'dibayar',
        ]);
    }
}
