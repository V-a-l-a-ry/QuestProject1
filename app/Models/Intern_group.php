<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;

class Intern_group extends Model
{
    use HasFactory;
    protected $fillable = [ 'intern_id' ,'group_id'];




public function group()
{
    return $this->belongsTo(Group::class, 'group_id');
}


}