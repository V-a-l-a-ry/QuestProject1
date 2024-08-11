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

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
