<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'education_level' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'skills' => 'nullable|string',
        ]);

        $user = auth()->user();
        $user->update($request->only('username', 'education_level', 'bio', 'skills'));

        return redirect()->back()->with('status', 'Profile updated successfully!');
    }
}
