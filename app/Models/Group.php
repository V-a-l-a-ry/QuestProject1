<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'intern_group', 'group_id', 'user_id');
    }
}
