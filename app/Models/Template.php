<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'type',       // 'email' | 'pdf' (cover letter)
        'category',
        'subject',
        'body',
        'is_default',
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeEmail($query)
    {
        return $query->where('type', 'email');
    }

    public function scopeCoverLetter($query)
    {
        return $query->where('type', 'pdf');
    }

    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }

    /**
     * Jadikan template ini default, lalu lepas status default
     * dari template lain milik user yang sama & type yang sama.
     */
    public function makeDefault(): void
    {
        static::where('user_id', $this->user_id)
            ->where('type', $this->type)
            ->where('id', '!=', $this->id)
            ->update(['is_default' => false]);

        $this->update(['is_default' => true]);
    }
}
