<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_name',
        'group_leader_id',
        'github_link',
    ];

    // Relationship: One group can have many users as members
    public function members()
    {
        return $this->belongsToMany(User::class, 'group_user');
    }

    // Relationship: One group has one group leader
    public function leader()
    {
        return $this->belongsTo(User::class, 'group_leader_id');
    }

    // A group can have multiple projects
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
