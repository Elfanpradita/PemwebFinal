<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testi extends Model
{
    use HasFactory;
    protected $table = 'testis';
    protected $fillable = [
        'name',
        'profession',
        'image',
        'content',
    ];
}

        //    $table->id();
        //     $table->string('name');
        //     $table->string('profession');
        //     $table->string('image');
        //     $table->text('content');
        //     $table->timestamps();