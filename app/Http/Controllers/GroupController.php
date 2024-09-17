<?php

namespace App\Http\Controllers;
use App\Models\Group;
use App\Models\Task;
use App\Models\User;
use App\Models\intern_groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException; // For query-related exceptions
use Illuminate\Validation\ValidationException;


class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
      

        $newIntern = DB::table('users')
        ->leftJoin('intern_groups', 'users.id', '=', 'intern_groups.intern_id')
        ->select('users.name' , 'users.id')
        ->whereNull('intern_groups.intern_id') // Select users not in intern_groups
        ->get();
    
     
        return view('Group/index', compact('groups', 'newIntern'));

    }




public function assignTask(Request $request){

   

    $validatedData = $request->validate([
        'group_id' => 'required',
       /* 'taskName2' => 'required|string|max:255',
        'taskDescription2' => 'required|string',*/
        'task' => 'required',
        'description' => 'nullable|string',
        'date' => 'required|date',
    ]);

    $task = new Task();
    $task->title = $validatedData['task'];
    $task->description = $validatedData['description'];
    $task->due_date = $validatedData['date'];
    $task->admin_id = Auth::id();
    $task->group_id = $validatedData['group_id'];
   

    $task->save();

    return redirect()->route('group.index')->with('success', 'Task added successfully.');

}



public function destroy($id)
{
    $group = Group::findOrFail($id);

        // Delete the group
        $group->delete();
        // Redirect or return response
        return redirect()->route('group.index')->with('success', 'Group deleted successfully.');return redirect()->route('group.index')->with('success', 'Task deleted successfully');
    
}







public function store(Request $request)
{

 
   
    // Validate the request data
    $validatedData = $request->validate([
        'groupname' => 'required|string|max:255',
       
    ]);


        // Create a new group with the admin user ID, task ID, and group name
       
        $group = new Group();
        $group->name =  $validatedData['groupname'];
        $group->admin_id = Auth::id(); 
      

        $group->save();

        
    // Redirect to a success page or return a response
    return redirect()->route('group.index')->with('success', 'Group and task created successfully!');
}




public function storess(Request $request)
{
   // dd($request->all());
    // Validate the incoming request
    $validatedData = $request->validate([
        'groupnames' => 'required',
    ]);

    // Create the group, making sure to save the admin_id
    $group = new Group();
    $group->name = $validatedData['groupnames'];
    $group->admin_id = Auth::id(); 
    // Save the authenticated user's ID
    
    // Save the new group to the database
    $group->save();

    // Redirect after creation
    return redirect()->route('group.index')->with('success', 'Group created successfully!');
}






public function showIntern(){

    $newIntern = DB::table('intern_groups')
    ->join('users', 'intern_groups.intern_id', '=', 'users.id')
    ->select('users.name', 'users.email', 'intern_groups.group_id')
    ->get();

    return view('Group.index', ['newIntern' => $newIntern]);
}



public function addnewIntern(Request $request){


    $validatedData = $request->validate([
        'group_id2' => 'required', 
        'intern_id' => 'required',
    ]);
    
    // Insert into the intern_groups table
    $addIntern = DB::table('intern_groups')->insert([
        'intern_id' => $validatedData['intern_id'],
        'group_id' => $validatedData['group_id2'],
    ]);
    

    return redirect()->route('group.index')->with('success', 'Intern added to group successfully.');
    

}


}







