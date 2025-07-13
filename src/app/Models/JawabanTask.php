<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JawabanTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'murid_id',
        'upload_task',
	'nilai_murid',
    ];

    /**
     * Relasi ke Task
     */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    /**
     * Relasi ke Murid
     */
    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }
}
