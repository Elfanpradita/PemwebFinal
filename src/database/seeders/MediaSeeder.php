<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Media::create([
            'twitter' => 'https://twitter.com',
            'facebook' => 'https://www.facebook.com/elfan.praditarusmin',
            'youtube' => 'https://youtube.com/@elpun378',
            'linkedin' => 'https://www.linkedin.com/in/elfan-pradita-rusmin',
        ]);
    }
}
