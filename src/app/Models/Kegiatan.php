<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengajar_id',
        'event_course_id',
        'nama',
        'tanggal',
        'start',
        'end',
    ];

    /**
     * Relasi ke Ruang
     */

    /**
     * Relasi ke Pengajar
     */
    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class);
    }

    /**
     * Relasi ke EventCourse
     */
    public function eventCourse()
    {
        return $this->belongsTo(EventCourse::class);
    }

    public function moduls()
    {
        return $this->hasMany(modul::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }

    public function absensipengajars()
    {
        return $this->hasMany(AbsensiPengajar::class);
    }
}
