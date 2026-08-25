<?php
// app/Models/SystemLog.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemLog extends Model
{
    protected $fillable = ['level', 'event', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper statis biar gampang dipanggil dari controller lain
    public static function log(string $level, string $event, ?string $description = null, ?int $userId = null): void
    {
        static::create([
            'level'       => $level,
            'event'       => $event,
            'description' => $description,
            'user_id'     => $userId,
        ]);
    }
}
