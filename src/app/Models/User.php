<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use App\Models\Employee;
use App\Models\Pengajar;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory,HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'avatar_url',
        'name',
        'email',
        'password',
        'no_wa',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getFilamentAvatarUrl(): ?string
    {
        if ($this->avatar_url) {
            return asset('storage/' . $this->avatar_url);
        } else {
            $hash = md5(strtolower(trim($this->email)));

            return 'https://www.gravatar.com/avatar/' . $hash . '?d=mp&r=g&s=250';
        }
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return match ($panel->getId()) {
            'admin' => $this->hasAnyRole('super_admin', 'admin_magang', 'akademik', 'administrasi'),
            'edu' => $this->hasAnyRole('murid', 'pengajar'),
            default => false,
        };
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function pengajars()
    {
        return $this->hasMany(Pengajar::class);
    }

    public function murids()
    {
        return $this->hasMany(Murid::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function eventCourses()
    {
    return $this->belongsToMany(EventCourse::class, 'event_course_user');
    }

    public function murid()
{
    return $this->hasOne(\App\Models\Murid::class);
}

// User.php
public function pengajar()
{
    return $this->hasOne(Pengajar::class);
    return $this->hasOne(\App\Models\Pengajar::class);
}

}