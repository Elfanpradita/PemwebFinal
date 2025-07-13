<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Mengosongkan tabel untuk menghindari duplikasi data saat seeder dijalankan ulang
        Departemen::query()->delete();

        /**
         * Membuat data departemen berdasarkan Business Requirement Document (BRD).
         * Setiap departemen merepresentasikan peran (role) stakeholder di dalam sistem.
         */

        // Departemen untuk Admin Operasional Digital (Super Admin)
        Departemen::create([
            'branch_company_id' => 1, // Asumsi ID 1 untuk Head Office
            'name' => 'Operasional Digital',
            'description' => 'Bertugas mengelola kelancaran operasional website Company Profile serta sistem online perusahaan, termasuk akses terhadap modul HRM dan LMS.',
        ]);

        // Departemen untuk Tim Akademik
        Departemen::create([
            'branch_company_id' => 1,
            'name' => 'Akademik',
            'description' => 'Bertugas mengatur berbagai aspek pembelajaran, mulai dari penyusunan kurikulum, rekap nilai, sertifikat, hingga penjadwalan mengajar.',
        ]);

        // Departemen untuk Tim Administrasi
        Departemen::create([
            'branch_company_id' => 1,
            'name' => 'Administrasi',
            'description' => 'Bertugas memastikan kelancaran proses administrasi internal seperti absensi pegawai, pengelolaan gaji, serta cuti pengajar.',
        ]);

        // Departemen untuk Pengajar
        Departemen::create([
            'branch_company_id' => 1,
            'name' => 'Pengajar',
            'description' => 'Bertugas menyampaikan materi, membuat dan mengunggah modul pembelajaran, memberikan tugas, serta menilai hasil tugas peserta didik.',
        ]);

        // Departemen untuk Tim Akademik
        Departemen::create([
            'branch_company_id' => 2,
            'name' => 'Akademik',
            'description' => 'Bertugas mengatur berbagai aspek pembelajaran, mulai dari penyusunan kurikulum, rekap nilai, sertifikat, hingga penjadwalan mengajar.',
        ]);

        // Departemen untuk Tim Administrasi
        Departemen::create([
            'branch_company_id' => 2,
            'name' => 'Administrasi',
            'description' => 'Bertugas memastikan kelancaran proses administrasi internal seperti absensi pegawai, pengelolaan gaji, serta cuti pengajar.',
        ]);

        // Departemen untuk Pengajar
        Departemen::create([
            'branch_company_id' => 2,
            'name' => 'Pengajar',
            'description' => 'Bertugas menyampaikan materi, membuat dan mengunggah modul pembelajaran, memberikan tugas, serta menilai hasil tugas peserta didik.',
        ]);
    }
}
