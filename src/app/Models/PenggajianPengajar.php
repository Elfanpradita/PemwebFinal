<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenggajianPengajar extends Model
{
    use HasFactory;

    protected $fillable = [
        'gaji_pengajar_id',
        'pengajar_id',
        'periode_awal',
        'periode_akhir',
        'total_pertemuan',
        'total_gaji',
        'tanggal_transfer',
        'keterangan',
        'status', // pending, approved, rejected
    ];

    /**
     * Relasi ke GajiPengajar
     */
    public function gajiPengajar()
    {
        return $this->belongsTo(GajiPengajar::class);
    }

    /**
     * Relasi ke Pengajar
     */
    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class);
    }
}
