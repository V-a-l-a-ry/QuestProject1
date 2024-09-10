<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show a form for a user to fill in their details
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        // Create a new user with the validated data from the request
        $user = User::create([
            'email' => $request->email,
            'fullName' => strtolower($request->fullName), // Convert full name to lowercase
            'avatar' => strtolower($request->avatar), // Convert full name to lowercase
            'password' => Hash::make($request->password), // Hash the password
            'educationalLevel' => $request->educationalLevel,
            'role' => $request->role,
            'bioInfo' => $request->bioInfo, 
            'skills' => $request->skills, 
        ]);
        // Redirect the user to their dashboard or home page after registration
        return redirect()->route('login')->with('success', 'Registration successful! Welcome, ' . $user->fullName);
    }



     // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // convert 'remember' to boolean 
        $request->merge([
            'remember' => $request->has('remember') ? true : false,
        ]);

        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'remember' => 'boolean', 
        ]);

        // Retrieve credentials from the request
        $credentials = $request->only('email', 'password');
        $remember = $request->remember; 

        // Check if the user exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // User with the provided email is not found
            return back()->withErrors([
                'email' => 'No account found with this email address.',
            ]);
        }

        // Attempt to authenticate the user
        if (Auth::attempt($credentials, $remember)) {
            // Authentication passed
            return redirect()->intended('/')->with('success', 'Logged in successfully!');
        }

        // Authentication failed (wrong password)
        return back()->withErrors([
            'password' => 'Invalid email or password.',
        ]);
    }



    // Handle user logout
    public function logout(Request $request )
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}
