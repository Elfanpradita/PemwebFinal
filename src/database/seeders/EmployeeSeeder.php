<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Mengosongkan tabel untuk menghindari duplikasi data
        Employee::query()->delete();

        // Membuat data Employee untuk role Administrasi
        Employee::create([
            'branch_company_id' => 1,       // Asumsi ID 1 untuk Head Office
            'user_id' => 2,                 // Sesuaikan dengan user_id Budi Santoso
            'nama_lengkap' => 'Budi Santoso',
            'no_telepon' => '081211112222',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Administrasi No. 1, Jakarta',
        ]);

        // Membuat data Employee untuk role Akademik
        Employee::create([
            'branch_company_id' => 1,       // Asumsi ID 1 untuk Head Office
            'user_id' => 3,                 // Sesuaikan dengan user_id Citra Lestari
            'nama_lengkap' => 'Citra Lestari',
            'no_telepon' => '081333334444',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Cendekia No. 2, Tangerang',
        ]);
    }
}
