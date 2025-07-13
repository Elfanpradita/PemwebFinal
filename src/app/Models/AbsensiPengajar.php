<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AbsensiPengajar extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_course_id',
        'kegiatan_id',
        'pengajar_id',
        'status',
        'keterangan',
    ];

    /**
     * Relasi ke EventCourse
     */
    public function eventCourse()
    {
        return $this->belongsTo(EventCourse::class);
    }

    /**
     * Relasi ke Kegiatan
     */
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    /**
     * Relasi ke Pengajar
     */
    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class);
    }
}
