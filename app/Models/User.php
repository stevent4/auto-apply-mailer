<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'name',
    'email',
    'birth_place',
    'birth_date',
    'education',
    'address',
    'phone',
    'status',
    'password',
])]

#[Hidden([
    'password',
    'remember_token',
])]

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'birth_date' => 'date',
            'password' => 'hashed',
            'profile_completed' => 'boolean',
        ];
    }

    public function templates(): HasMany
    {
        return $this->hasMany(Template::class);
    }

    public function googleAccount(): HasOne
    {
        return $this->hasOne(GoogleAccount::class);
    }

    public function applicationHistories(): HasMany
    {
        return $this->hasMany(ApplicationHistory::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    protected static function booted()
    {
        static::deleting(function ($user) {
            // Asumsikan relasi ke lamaran/berkas bernama 'applications' atau 'applicationHistories'
            // dan kolom penyimpanannya bernama 'file_path' (sesuaikan dengan nama kolom Anda)
            foreach ($user->applicationHistories as $application) {
                if ($application->file_path && Storage::disk('public')->exists($application->file_path)) {
                    Storage::disk('public')->delete($application->file_path);
                }
            }
        });
    }
}
