<?php

namespace Database\Seeders;

use App\Models\Karyawan; // Pastikan nama model sudah benar
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Mengosongkan tabel untuk menghindari duplikasi data
        Karyawan::query()->delete();

        // Contoh data absensi untuk Budi Santoso (Administrasi)
        Karyawan::create([
            'employee_id' => 1, // Asumsi ID 1 untuk Budi Santoso
            'tanggal' => now()->toDateString(),
            'status' => 'hadir', // Nilai ENUM harus berupa string
            'keterangan' => 'Hadir tepat waktu.',
        ]);

        // Contoh data absensi untuk Citra Lestari (Akademik)
        Karyawan::create([
            'employee_id' => 2, // Asumsi ID 2 untuk Citra Lestari
            'tanggal' => now()->toDateString(),
            'status' => 'hadir', // Nilai ENUM harus berupa string
            'keterangan' => 'Hadir tepat waktu.',
        ]);

        // Contoh data absensi untuk hari sebelumnya
        Karyawan::create([
            'employee_id' => 1, // Budi Santoso
            'tanggal' => now()->subDay()->toDateString(),
            'status' => 'hadir', // Nilai ENUM harus berupa string
            'keterangan' => 'Hadir.',
        ]);

        // PERBAIKAN: Pastikan nilai untuk kolom 'status' adalah string yang valid
        Karyawan::create([
            'employee_id' => 2, // Citra Lestari
            'tanggal' => now()->subDay()->toDateString(),
            'status' => 'sakit', // Nilai ENUM harus berupa string
            'keterangan' => 'Izin sakit dengan surat dokter.',
        ]);
    }
}
