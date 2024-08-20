<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function internProgress()
    {
        return $this->belongsTo(InternProgress::class, 'progress_id');
    }

    public function feedbackable()
    {
        return $this->morphTo();
    }
}
