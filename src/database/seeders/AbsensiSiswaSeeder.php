<?php

namespace Database\Seeders;

use App\Models\AbsensiSiswa;
use App\Models\Murid; // Pastikan model Murid di-import
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AbsensiSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Mengosongkan tabel untuk menghindari duplikasi
        AbsensiSiswa::query()->delete();

        // Ambil data murid dari database untuk mendapatkan ID yang benar
        $muridChrisella = Murid::where('user_id', 6)->first();
        $muridAnisah = Murid::where('user_id', 11)->first();
        $muridElfan = Murid::where('user_id', 14)->first();

        // Pastikan murid ditemukan sebelum membuat absensi
        if ($muridChrisella && $muridAnisah && $muridElfan) {
            // Data absensi untuk Chrisella Natasia
            AbsensiSiswa::create([
                'kegiatan_id' => 1,
                'murid_id' => $muridChrisella->id,
                'status' => 'hadir',
                'keterangan' => 'Hadir tepat waktu.',
            ]);
            AbsensiSiswa::create([
                'kegiatan_id' => 2,
                'murid_id' => $muridChrisella->id,
                'status' => 'izin',
                'keterangan' => 'Izin sakit, ada surat dokter.',
            ]);

            // Data absensi untuk Anisah SR
            AbsensiSiswa::create([
                'kegiatan_id' => 1,
                'murid_id' => $muridAnisah->id,
                'status' => 'hadir',
                'keterangan' => 'Hadir.',
            ]);
            AbsensiSiswa::create([
                'kegiatan_id' => 3,
                'murid_id' => $muridAnisah->id,
                'status' => 'izin',
                'keterangan' => 'Izin ada acara keluarga.',
            ]);

            // Data absensi untuk Elfan Padita Rusmin
            AbsensiSiswa::create([
                'kegiatan_id' => 3,
                'murid_id' => $muridElfan->id,
                'status' => 'hadir',
                'keterangan' => 'Hadir.',
            ]);
            AbsensiSiswa::create([
                'kegiatan_id' => 4,
                'murid_id' => $muridElfan->id,
                'status' => 'alpa', // Nilai 'alpa' sudah benar
                'keterangan' => 'Tidak ada keterangan.',
            ]);
        } else {
            // Pesan ini akan muncul jika seeder murid belum dijalankan
            $this->command->info('Murid tidak ditemukan. Pastikan MuridSeeder sudah dijalankan terlebih dahulu.');
        }
    }
}
