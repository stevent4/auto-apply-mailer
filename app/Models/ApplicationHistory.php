<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApplicationHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email_hrd',
        'nama_pt',
        'posisi',
        'subjek',
        'status',
        'email_template_id',
        'cover_letter_template_id',
        'email_body',
        'cover_letter_body',
        'cover_letter_pdf_path',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function emailTemplate(): BelongsTo
    {
        return $this->belongsTo(Template::class, 'email_template_id');
    }

    public function coverLetterTemplate(): BelongsTo
    {
        return $this->belongsTo(Template::class, 'cover_letter_template_id');
    }
}
