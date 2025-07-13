<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_company_id',
        'user_id',
        'nama_lengkap',
        'no_telepon',
        'jenis_kelamin',
        'alamat',
    ];

    /**
     * Relasi ke BranchCompany
     */
    public function branchCompany()
    {
        return $this->belongsTo(BranchCompany::class);
    }

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Karyawan
     */
    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
    
    /**
     * Relasi ke Pengajar
     */
    public function penggajians()   
    {
        return $this->hasMany(Penggajian::class);
    }

    public function eventcourses()   
    {
        return $this->hasMany(EventCourse::class);
    }
}