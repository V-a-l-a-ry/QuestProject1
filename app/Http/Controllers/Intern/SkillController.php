<?php

namespace App\Http\Controllers\Intern;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function index()
    {
    $Skill= Auth::user()->skills;
    return view('intern.skills', compact('skills'));
    // Skill development logic
}
}