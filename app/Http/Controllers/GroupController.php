<?php

namespace App\Http\Controllers;
use App\Models\Group;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException; // For query-related exceptions
use Illuminate\Validation\ValidationException;


class GroupController extends Controller
{
    public function index()
    {

        return view('Group/index');
    }



public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'groupName' => 'required|string|max:255',
        'task' => 'required|string|max:255',
        'description' => 'nullable|string',
        'date' => 'required|date',
    ]);

    try {
        // Create a new task first
        $task = Task::create([
            'title' => $validatedData['task'],
            'description' => $validatedData['description'],
            'due_date' => $validatedData['date'],
            'admin_id' => Auth::id(),
        ]);

        // Create a new group with the admin user ID, task ID, and group name
        Group::create([
            'name' => $validatedData['groupName'],
            'admin_id' => Auth::id(),
            'task_id' => $task->id,
        ]);
        
    } catch (\Exception $e) {
        // Handle the exception if something goes wrong
        return redirect()->back()->withErrors(['error' => 'An error occurred while creating the group and task.']);
    }

    // Redirect to a success page or return a response
    return redirect()->route('group.index')->with('success', 'Group and task created successfully!');
}








}
