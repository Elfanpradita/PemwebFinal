<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create([
            'name' => 'Elfan Pradita Rusmin',
            'designation' => 'Mandarin',
            'image' => 'suki/img/elfan.jpg',
            'facebook' => 'https://www.facebook.com/elfan.praditarusmin',
            'twitter' => 'https://twitter.com',
            'instagram' => 'https://www.instagram.com/elfan_pradita/',
        ]);
    }
}
