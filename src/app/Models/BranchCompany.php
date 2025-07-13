<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BranchCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'address',
    ];

    /**
     * Relasi ke Company (Many to One)
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function departemens()
    {
        return $this->hasMany(Departemen::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}