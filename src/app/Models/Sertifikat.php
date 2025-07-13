<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sertifikat extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_course_id',
        'murid_id',
        'title',
        'upload_sertifikat',
    ];

    /**
     * Relasi ke Event Course
     */
    public function eventCourse()
{
    return $this->belongsTo(\App\Models\EventCourse::class);
}

public function murid()
{
    return $this->belongsTo(\App\Models\Murid::class);
}
}
