<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Title extends Model
{
    protected $table = 'titles';
    protected $fillable = [
        'title',
    ];
}
