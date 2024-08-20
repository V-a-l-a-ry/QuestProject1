<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function group()
    {
        return $this->hasOne(Group::class, 'task_id');
    }

    public function internProgress()
    {
        return $this->hasMany(InternProgress::class, 'task_id');
    }

    public function skillDevelopment()
    {
        return $this->hasMany(SkillDevelopment::class, 'task_id');
    }
}
