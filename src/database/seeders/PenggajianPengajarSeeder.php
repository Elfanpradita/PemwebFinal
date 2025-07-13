<?php

namespace Database\Seeders;

use App\Models\PenggajianPengajar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class PenggajianPengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Mengosongkan tabel untuk menghindari duplikasi
        PenggajianPengajar::query()->delete();

        // --- Gaji Bulan Juni 2025 ---
        $periodeJuni = Carbon::create(2025, 6);

        // Gaji untuk Johny Christian (ID 1)
        PenggajianPengajar::create([
            'gaji_pengajar_id' => 1,      // Asumsi ID ini untuk skema gaji pengajar
            'pengajar_id' => 1,
            'periode_awal' => $periodeJuni->startOfMonth()->toDateString(),
            'periode_akhir' => $periodeJuni->endOfMonth()->toDateString(),
            'total_pertemuan' => 12,
            'total_gaji' => 6000000,
            'tanggal_transfer' => $periodeJuni->copy()->addMonth()->setDay(5)->toDateString(),
            'keterangan' => 'Gaji mengajar Juni 2025 untuk Johny Christian.',
            'status' => 'approved',
        ]);

        // Gaji untuk Yukimura Takuro (ID 2)
        PenggajianPengajar::create([
            'gaji_pengajar_id' => 1,
            'pengajar_id' => 2,
            'periode_awal' => $periodeJuni->startOfMonth()->toDateString(),
            'periode_akhir' => $periodeJuni->endOfMonth()->toDateString(),
            'total_pertemuan' => 12,
            'total_gaji' => 6000000,
            'tanggal_transfer' => $periodeJuni->copy()->addMonth()->setDay(5)->toDateString(),
            'keterangan' => 'Gaji mengajar Juni 2025 untuk Yukimura Takuro.',
            'status' => 'approved',
        ]);

        // --- Gaji Bulan Mei 2025 (Contoh data historis) ---
        $periodeMei = Carbon::create(2025, 5);

        // Gaji untuk Johny Christian (ID 1)
        PenggajianPengajar::create([
            'gaji_pengajar_id' => 1,
            'pengajar_id' => 1,
            'periode_awal' => $periodeMei->startOfMonth()->toDateString(),
            'periode_akhir' => $periodeMei->endOfMonth()->toDateString(),
            'total_pertemuan' => 11, // Contoh pertemuan tidak penuh
            'total_gaji' => 5500000, // Gaji disesuaikan
            'tanggal_transfer' => $periodeMei->copy()->addMonth()->setDay(5)->toDateString(),
            'keterangan' => 'Gaji mengajar Mei 2025, ada 1x tidak masuk.',
            'status' => 'approved',
        ]);

        // Gaji untuk Yukimura Takuro (ID 2) - Contoh status pending
        PenggajianPengajar::create([
            'gaji_pengajar_id' => 1,
            'pengajar_id' => 2,
            'periode_awal' => $periodeMei->startOfMonth()->toDateString(),
            'periode_akhir' => $periodeMei->endOfMonth()->toDateString(),
            'total_pertemuan' => 12,
            'total_gaji' => 6000000,
            'tanggal_transfer' => null, // Belum ditransfer
            'keterangan' => 'Gaji mengajar Mei 2025, menunggu approval.',
            'status' => 'pending',
        ]);
    }
}
