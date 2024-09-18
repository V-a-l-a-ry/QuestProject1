<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Models\intern_group;
use App\Models\Task;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class internAuthController extends Controller
{
     

     public function index()
     {

    $userId = auth()->user()->id;

     $groupAssigned = intern_group::where('intern_id', $userId)
    ->with('group') 
    ->get();
        
   
   
    $groupIds = $groupAssigned->pluck('group_id'); // 
    $tasks = Task::whereIn('group_id', $groupIds)->get();

     
     return view('intern.internDashboard', compact('groupAssigned', 'tasks'));
     




     }
 
















     public function create()
     {
         return view('internAuth.register');
     }
 
     /**
      * Store a newly created resource in storage.
      */
     public function store(Request $request)
     {


        $validatedData = $request->validate([  
            'email' => 'required|email|max:255|unique:users,email',
            'fullName' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'educationalLevel' => 'required|string|max:255',
            'role' => 'required|in:intern',
            'bioInfo' => 'nullable',
            'skills' => 'nullable',
            'avatar' => 'nullable|string|max:255' // Added avatar validation if needed
        ]);
        
     
        $user = User::create([
            'email' => $validatedData['email'],
            'name' => strtolower($validatedData['fullName']), 
            'avatar' => strtolower($validatedData['avatar'] ?? ''), 
            'password' => Hash::make($validatedData['password']), 
            'educationalLevel' => $validatedData['educationalLevel'],
            'role' => $validatedData['role'],
            'bioInfo' => $validatedData['bioInfo'], 
            'skills' => $validatedData['skills'], 
        ]);
        
       
         return redirect()->route('login')->with('success', 'Registration successful! Welcome, ' . $user->fullName);
     }
 
 
 
      
     public function showLoginForm()
     {
         return view('internAuth.login');
     }
 
     public function internLogin(Request $request)
     {
       
         $request->merge([
             'remember' => $request->has('remember') ? true : false,
         ]);
 
       
         $request->validate([
             'email' => 'required|email',
             'password' => 'required|string',
             'remember' => 'boolean', 
         ]);
 
         $credentials = $request->only('email', 'password');
         $remember = $request->remember; 
 
         $user = User::where('email', $request->email)->first();
 
         if (!$user) {
           
             return back()->withErrors([
                 'email' => 'No account found with this email address.',
             ]);
         }
 

         if (Auth::attempt($credentials, $remember)) {
           
             return redirect()->route('intern.internDashboard')->with('success', 'Group created successfully!');
         }
 
     
         return back()->withErrors([
             'password' => 'Invalid email or password.',
         ]);
     }
 

 
 
     public function logout(Request $request )
     {
         Auth::logout();
 
         return redirect()->route('login')->with('success', 'Logged out successfully!');
     }
}
