<?php
// app/Models/Feedback.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';
    protected $fillable = [
        'user_id',
        'type',
        'category',
        'title',
        'description',
        'screenshot_path',
        'status',
        'related_application_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(FeedbackReply::class)->orderBy('created_at');
    }

    public function relatedApplication()
    {
        return $this->belongsTo(ApplicationHistory::class, 'related_application_id');
    }
}
