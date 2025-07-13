<?php
// app/Models/PendingRegistration.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PendingRegistration extends Model
{
    /**
     * Gunakan tabel "pending_registrations"
     * (sebenarnya bisa di‑skip karena sudah sama dengan nama model,
     * tapi eksplisit lebih jelas).
     */
    protected $table = 'pending_registrations';

    /**
     * Kolom yang boleh di‑isi mass‑assignment.
     */
    protected $fillable = [
        'name',
        'email',
        'password',        // sudah di‑hash sebelum disimpan
        'whatsapp',
        'event_course_id',
        'is_paid',
    ];

    /**
     * Casting otomatis agar is_paid berupa boolean.
     */
    protected $casts = [
        'is_paid' => 'boolean',
    ];

    /**
     * Relasi ke EventCourse (kelas yang dipilih user).
     */
    public function eventCourse(): BelongsTo
    {
        return $this->belongsTo(EventCourse::class);
    }
}
