<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Modul extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan_id',
        'title',
        'upload_modul',
    ];
    protected $casts = [
        'upload_modul' => 'string',
    ];

    /**
     * Relasi ke Kegiatan
     */
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
