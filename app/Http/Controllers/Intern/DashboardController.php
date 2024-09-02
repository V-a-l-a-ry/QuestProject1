<?php

namespace App\Http\Controllers\Intern;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user

        if (!$user) {
            abort(403, 'Unauthorized action.');
        }


        return view('intern.dashboard',compact('user'));
        // Intern dashboard logic here 
    }
}
