<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'github_link',
        'description',
        'project_status',
        'project_image',
    ];

    // Accessor for project status
    public function getProjectStatusAttribute($value)
    {
        return $value ? 'Completed' : 'Ongoing';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    //A project can have either a user or a group, but not both at the same time.
    public function owner()
    {
        return $this->user() ?: $this->group();
    }
}
