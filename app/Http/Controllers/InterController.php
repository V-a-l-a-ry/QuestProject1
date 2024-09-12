<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intern;





class InterController extends Controller
{
   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:interns,email',
            'phone' => 'required'
            // Add validation rules for other fields
        ]);

        $intern = Intern::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            // Assign other fields from the request
        ]);

        return response()->json([
            'message' => 'Intern created successfully',
            'intern' => $intern,
        ], 201);
    }
}


