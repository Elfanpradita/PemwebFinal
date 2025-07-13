<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penggajian extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'periode_awal',
        'periode_akhir',
        'total_gaji',
        'tanggal_transfer',
        'keterangan',
        'status',
    ];

    /**
     * Relasi ke Employee
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}