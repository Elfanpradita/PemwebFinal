<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'tanggal',
        'status',
        'keterangan',
    ];

    /**
     * Relasi ke Employee
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}