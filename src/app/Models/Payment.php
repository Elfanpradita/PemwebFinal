<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'event_course_id',
        'user_id',
        'nomor_pembayaran',
        'amount',
        'metode_pembayaran',
        'refrence',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    /**
     * Relasi ke EventCourse
     */
    public function eventCourse()
    {
        return $this->belongsTo(EventCourse::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
