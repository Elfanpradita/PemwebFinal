<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan_id',
        'title',
        'description',
    ];

    /**
     * Relasi ke Kegiatan
     */
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    /**
     * Relasi ke JawabanTask
     */
    public function jawabanTasks()
    {
        return $this->hasMany(JawabanTask::class);
    }

    /**
     * Relasi ke Pengajar
     */
    public function murid()
    {
        return $this->hasMany(Murid::class);
    }
}
