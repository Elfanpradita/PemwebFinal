<?php

namespace Database\Seeders;

use App\Models\BranchCompany;
use Illuminate\Database\Seeder;

class BranchCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BranchCompany::create([
            'company_id' => 1,  // Pastikan company dengan id 1 sudah ada di tabel companies
            'name' => 'Jakarta Branch',
            'address' => 'Jl. Sudirman No. 123, Jakarta',
        ]);

        BranchCompany::create([
            'company_id' => 1,
            'name' => 'Bandung Branch',
            'address' => 'Jl. Asia Afrika No. 45, Bandung',
        ]);
    }
}
