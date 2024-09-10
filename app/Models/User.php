<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'avatar',
        'educationalLevel',
        'role',
        'bioInfo',
        'fullName',
        'skills'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'skills' => 'array',
            'bioInfo' => 'array',
        ];
    }


    /**
     * Mutator to set the full name in lowercase.
     */
    public function setFullNameAttribute($value)
    {
        $this->attributes['fullName'] = strtolower($value);
    }
    /**
     * Mutator to set the educational level in lowercase.
     */
    public function setEducationalLevelAttribute($value)
    {
        $this->attributes['educationalLevel'] = strtolower($value);
    }

        /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Check if the user is an intern.
     *
     * @return bool
     */
    public function isIntern()
    {
        return $this->role === 'intern';
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
