<?php
namespace App\Http\Controllers\Intern;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index()
    {
        // Logic to fetch intern groups
        $groups =  Auth::user()->groups;
        return view('intern.groups', compact('groups'));
    }
}
