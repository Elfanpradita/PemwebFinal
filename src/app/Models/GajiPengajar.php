<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GajiPengajar extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_course_id',
        'gaji_pokok',
    ];

    /**
     * Relasi ke EventCourse
     */
    public function eventCourse()
    {
        return $this->belongsTo(EventCourse::class);
    }

    public function gajipengajars()
    {
        return $this->hasMany(GajiPengajar::class);
    }
}
