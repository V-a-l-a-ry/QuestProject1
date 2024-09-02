<?php
namespace App\Http\Controllers\Intern;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class TaskController extends Controller
{
    public function index()
    {
        // Logic to fetch intern tasks
        $tasks = Auth::user()->tasks;
        return view('intern.tasks', compact('tasks'));
    }
}
