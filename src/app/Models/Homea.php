<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Homea extends Model
{
    use HasFactory;
    protected $table = 'homeas';
    protected $fillable = [
        'slogan',
        'judul',
        'desc',
        'slogan2',
        'judul2',
        'desc2',
        'image',
        'image1',
        'image2',
    ];
}