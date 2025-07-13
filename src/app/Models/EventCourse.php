<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{
    BelongsTo,
    BelongsToMany,
    HasMany
};

class EventCourse extends Model
{
    use HasFactory;

    protected $table = 'event_courses';

    protected $fillable = [
        'nomor_event_course',
        'name',
        'description',
        'start',
        'end',
        'price',
        'employee_id',
        'pengajar_id',
    ];

    // Relasi ke Employee (bisa jadi pengajar)
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    // Relasi ke Pengajar
    public function pengajar(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Pengajar::class, 'pengajar_id');
    }

    // Relasi ke Kegiatan
    public function kegiatans(): HasMany
    {
        return $this->hasMany(Kegiatan::class);
    }

    // Relasi ke Payment
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    // Relasi ke GajiPengajar
    public function gajipengajars(): HasMany
    {
        return $this->hasMany(GajiPengajar::class);
    }

    // Relasi ke AbsensiPengajar
    public function absensipengajars(): HasMany
    {
        return $this->hasMany(AbsensiPengajar::class);
    }

    // Relasi ke PendingRegistration
    public function pendingRegistrations(): HasMany
    {
        return $this->hasMany(PendingRegistration::class);
    }

    // Relasi many-to-many ke Murid lewat pivot table event_course_murid
    public function murids(): BelongsToMany
    {
        return $this->belongsToMany(Murid::class, 'event_course_murid');
        return $this->belongsToMany(Murid::class, 'event_course_user');
        return $this->belongsToMany(\App\Models\Murid::class, 'event_course_user', 'event_course_id', 'user_id');
    }

    // Relasi many-to-many ke User (jika diperlukan)
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'event_course_user');
    }

    public function sertifikats()
    {
        return $this->hasMany(Sertifikat::class);
    }
}
