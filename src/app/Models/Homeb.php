<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Homeb extends Model
{
    use HasFactory;
    protected $table = 'homebs';
    protected $fillable = [
        'icon1',
        'isi1',
        'desc1',
        'icon2',
        'isi2',
        'desc2',
        'icon3',
        'isi3',
        'desc3',
        'icon4',
        'isi4',
        'desc4',
    ];
}
