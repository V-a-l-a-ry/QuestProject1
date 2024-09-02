<?php

namespace App\Http\Controllers\Intern;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class InternFeedbackController extends Controller
{
    public function index()
    {
        $feedback =  Auth::user()->feedback;
        return view('intern.feedback', compact('feedback'));
        // Feedback view logic for interns
    }
}
