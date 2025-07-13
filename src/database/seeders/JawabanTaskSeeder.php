<?php

namespace Database\Seeders;

use App\Models\JawabanTask;
use App\Models\Murid; // <-- Tambahkan ini
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JawabanTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Mengosongkan tabel untuk menghindari duplikasi
        JawabanTask::query()->delete();

        // PERBAIKAN: Ambil data murid dari database, jangan hardcode ID
        $muridChrisella = Murid::where('user_id', 6)->first(); // Chrisella Natasia
        $muridAnisah = Murid::where('user_id', 11)->first();   // Anisah SR (Pelajar)
        $muridElfan = Murid::where('user_id', 14)->first();   // Elfan Padita Rusmin

        // Pastikan murid ditemukan sebelum membuat jawaban task
        if ($muridChrisella && $muridAnisah && $muridElfan) {
            // --- Contoh Jawaban untuk Tugas Kursus Bahasa Inggris ---

            // Jawaban dari Chrisella untuk Task ID 1
            JawabanTask::create([
                'task_id' => 1,
                'murid_id' => $muridChrisella->id, // Gunakan ID yang sebenarnya
                'upload_task' => 'uploads/jawaban/chrisella_task_1.pdf',
            ]);

            // Jawaban dari Anisah untuk Task ID 2
            JawabanTask::create([
                'task_id' => 2,
                'murid_id' => $muridAnisah->id, // Gunakan ID yang sebenarnya
                'upload_task' => 'uploads/jawaban/anisah_task_2.docx',
            ]);

            // --- Contoh Jawaban untuk Tugas Kursus Bahasa Jepang ---

            // Jawaban dari Elfan untuk Task ID 3
            JawabanTask::create([
                'task_id' => 3,
                'murid_id' => $muridElfan->id, // Gunakan ID yang sebenarnya
                'upload_task' => 'uploads/jawaban/elfan_task_3.jpg',
            ]);

            // Jawaban dari Chrisella untuk Task ID 4 (belum dinilai)
            JawabanTask::create([
                'task_id' => 4,
                'murid_id' => $muridChrisella->id, // Gunakan ID yang sebenarnya
                'upload_task' => 'uploads/jawaban/chrisella_task_4.pdf',
            ]);
        } else {
            // Beri pesan jika murid tidak ditemukan, agar mudah di-debug
            $this->command->info('Murid tidak ditemukan. Pastikan MuridSeeder sudah dijalankan.');
        }
    }
}
