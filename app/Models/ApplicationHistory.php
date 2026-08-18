<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApplicationHistory extends Model
{
    protected $guarded = ['id'];

    /**
     * User pemilik history lamaran.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
