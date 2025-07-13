<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Homec extends Model
{
    use HasFactory;
    protected $table = 'homecs';
    protected $fillable = [
        'location',
        'telpon',
        'email',
    ];
}
