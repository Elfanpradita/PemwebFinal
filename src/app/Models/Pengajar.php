<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Pengajar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'departemen_id',
        'no_telepon',
        'jenjang_pendidikan',
        'bidang_ajar',
        'jenis_kelamin',
        'alamat',
    ];

    /**
     * Relasi ke User
     */
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    /**
     * Relasi ke Departemen
     */
    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function absensipengajars()
    {
        return $this->hasMany(AbsensiPengajar::class);
    }

    public function gajipengajars()
    {
        return $this->hasMany(GajiPengajar::class);
    }
    
    public function eventCourse()
    {
        return $this->hasMany(EventCourse::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

}