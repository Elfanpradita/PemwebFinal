<?php

namespace Database\Seeders;

use App\Models\Homec;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Homec::create([
            'location' => 'Citra Raya',
            'telpon' => '0812-3456-7890',
            'email' => 'tampan@gmail.com',
        ]);
    }
}
