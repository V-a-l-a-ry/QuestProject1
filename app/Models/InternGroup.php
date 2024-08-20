<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class InternGroup extends Pivot
{
    protected $table = 'intern_group';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
