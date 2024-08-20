<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternProgress extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function skillDevelopment()
    {
        return $this->belongsTo(SkillDevelopment::class, 'skill_id');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'progress_id');
    }
}
