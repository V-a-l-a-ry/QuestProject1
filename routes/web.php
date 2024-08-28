<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Intern\DashboardController as InternDashboard;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\GroupController ;
use App\Http\Controllers\Intern\profileController;
use App\Http\Controllers\Intern\SkillController;
use App\Http\Controllers\Intern\InternFeedbackController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/about', function () {
    return view('Pages.about');
})->name('about');

//authentication
Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

Route::get('/login', [LoginUserController::class, 'create'])->name('login');
Route::post('/login', [LoginUserController::class, 'store'])->name('login.store');

Route::post('/logout', [LoginUserController::class, 'destroy'])->name('logout.destroy');



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/feedback', FeedbackController::class);
    Route::resource('/admin/Group', GroupController::class);
});

Route::middleware(['auth', 'role:intern'])->group(function () {
    Route::get('/intern/dashboard', [InternDashboard::class, 'index'])->name('intern.dashboard');
    Route::resource('/intern/profile', profileController::class);
    Route::resource('/intern/skills', SkillController::class);
    Route::get('/intern/feedback', [InternFeedbackController::class, 'index'])->name('intern.feedback');
});
