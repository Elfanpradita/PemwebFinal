<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AbsensiSiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan_id',
        'murid_id',
        'status',
        'keterangan',
    ];

    /**
     * Relasi ke Kegiatan
     */
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
        return $this->belongsTo(\App\Models\Kegiatan::class);
    }

    /**
     * Relasi ke Murid
     */
    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }
}
