<?php

namespace App\Http\Controllers\Intern;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function index()
    {
    $profile =  Auth::user()->profile;
    return view('intern.profile', compact('profile'));
    // Profile management logic
}
public function edit($id)
{
    $user = Auth::user();

    // Check if the authenticated user is trying to edit their own profile
    if ($user->id != $id) {
        return redirect()->route('intern.profile.edit', $user->id);
    }

    return view('intern.profile.edit', compact('user'));
}
public function update(Request $request, $id)
{
    $user = Auth::user();

    // Validate and update user profile
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        // Add more validation rules as necessary
    ]);

    $user->update($request->all());

    return redirect()->route('intern.profile.edit', $user->id)->with('success', 'Profile updated successfully');
}
}
