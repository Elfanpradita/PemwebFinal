<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Murid extends Model
{
    use HasFactory;

    protected $table = 'murids';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'no_telepon',
        'umur',
        'tempat_tanggal_lahir',
        'alamat',
        'jenjang_pendidikan',
    ];

    /**
     * Relasi ke model User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
        return $this->belongsTo(\App\Models\User::class);
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }

    public function eventCourses()
    {
        return $this->belongsToMany(EventCourse::class, 'event_course_murid');
        return $this->belongsToMany(EventCourse::class, 'event_course_user');
        return $this->belongsToMany(\App\Models\EventCourse::class, 'event_course_user', 'user_id', 'event_course_id');
    }

    public function sertifikats()
    {
        return $this->hasMany(Sertifikat::class);
    }
    
}
