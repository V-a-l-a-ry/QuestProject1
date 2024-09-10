<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.layout');
})-> middleware('auth'); 

//Auth routes
Route::get('auth/register', [AuthController::class, 'create'])->name('register.create'); // Show the registration form
Route::post('auth/register', [AuthController::class, 'store'])->name('register.store'); // Handle the form submission
Route::get('auth/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('auth/login', [AuthController::class, 'login'])->name('login.store');
Route::post('auth/logout', [AuthController::class, 'logout'])->name('logout');

//pages
Route::view('/', 'pages.profile')->name('profile')-> middleware('auth');

