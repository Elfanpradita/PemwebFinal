<?php

namespace Database\Seeders;

use App\Models\Sertifikat;
use App\Models\Murid; // Pastikan model Murid di-import
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SertifikatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Mengosongkan tabel untuk menghindari duplikasi
        Sertifikat::query()->delete();

        // Ambil data murid dari database untuk mendapatkan ID yang benar
        $muridChrisella = Murid::where('user_id', 6)->first();
        $muridElfan = Murid::where('user_id', 14)->first();

        // Pastikan murid dan kursus ada sebelum membuat sertifikat
        if ($muridChrisella && $muridElfan) {
            // Sertifikat untuk Murid Chrisella untuk Kursus Bahasa Inggris
            Sertifikat::create([
                'event_course_id' => 1,   // Asumsi ID 1 untuk Kursus Inggris
                'murid_id' => $muridChrisella->id,
                'title' => 'Certificate of Completion - English for Beginners',
                'upload_sertifikat' => 'sertifikats/chrisella_natasia_inggris.pdf',
            ]);

            // Sertifikat untuk Murid Elfan untuk Kursus Bahasa Jepang
            Sertifikat::create([
                'event_course_id' => 2,   // Asumsi ID 2 untuk Kursus Jepang
                'murid_id' => $muridElfan->id,
                'title' => 'Certificate of Completion - Japanese N5 Level',
                'upload_sertifikat' => 'sertifikats/elfan_padita_jepang.pdf',
            ]);
        } else {
            // Pesan ini akan muncul jika seeder murid belum dijalankan
            $this->command->info('Murid tidak ditemukan. Pastikan MuridSeeder sudah dijalankan.');
        }
    }
}