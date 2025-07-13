<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departemen extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_company_id',
        'name',
        'description',
    ];

    /**
     * Relasi ke BranchCompany
     */
    public function branchCompany()
    {
        return $this->belongsTo(BranchCompany::class);
    }

    /**
     * Relasi ke Pengajar
     */
    public function pengajars()
    {
        return $this->hasMany(Pengajar::class);
    }

}