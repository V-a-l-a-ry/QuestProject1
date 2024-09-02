<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function create()
    {
        return view('Auth.login');
    }

    public function store(Request $request)
    {
        $loginData = $request->only('email', 'password');
        if (Auth::attempt($loginData)) {
            return redirect()->route('home');
        }
        return redirect()->route('login')->with('error', 'Login details are not valid');
    }
    // In app/Http/Controllers/Auth/LoginController.php
protected function authenticated(Request $request, $user)
{
    if ($user->role === 'intern') {
        return redirect()->route('intern.profile.edit', $user->id);
    }

    // Default redirect for other users
    return redirect()->route('home');
}

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
