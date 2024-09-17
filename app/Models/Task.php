<?php

namespace App\Models;

use App\Model\User;
use App\Model\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'group_id',
        'admin_id',
    ];
}
