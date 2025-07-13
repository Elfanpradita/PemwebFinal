<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Abtpoint extends Model
{
    use HasFactory;
    protected $table = 'abtpoints';
    protected $fillable = [
        'point',
    ];
}
