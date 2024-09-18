<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\internAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});









// Admin Auth
Auth::routes();
Route::middleware('can:admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashController::class, 'index'])->name('dashboard')->middleware('auth');

    Route::get('Group/index', [App\Http\Controllers\GroupController::class, 'index'])->middleware('auth')->name('group.index');
    Route::post('create', [App\Http\Controllers\GroupController::class, 'store'])->name('create.group');


    Route::post('/assign', [App\Http\Controllers\GroupController::class, 'assignTask'])->middleware('auth')->name('assign.task');



    Route::delete('/groups/{id}', [App\Http\Controllers\GroupController::class, 'destroy'])->middleware('auth')->name('destroy');
    Route::post('/group/add', [App\Http\Controllers\GroupController::class, 'addnewIntern'])->middleware('auth')->name('add.Togroup');


   /* Route::get('/groups/create', function() {
        return view('Group/create'); 
    })->name('group.create');
    
    Route::post('/groups', [App\Http\Controllers\GroupController::class, 'store'])->middleware('auth')->name('create.groupName');
    */
});










Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth');
Route::post('/profile', [ProfileController::class, 'update'])->middleware('auth');




























//INTERN AUTH
Route::get('internAuth/internLogin', [internAuthController::class, 'showLoginForm'])->name('intern.login');
Route::get('internAuth/internRegister', [internAuthController::class, 'create'])->name('register.create');

Route::post('internAuth/internRegister', [internAuthController::class, 'store'])->name('internRegister.store'); // Handle the form submission
Route::post('internAuth/internLogin', [internAuthController::class, 'internLogin'])->name('internLogin.store');
Route::post('internAuth/internLogout', [internAuthController::class, 'logout'])->name('internLogout');


Route::middleware('can:intern')->group(function () {
Route::get('intern/dashboard', [internAuthController::class, 'index'])->name('intern.internDashboard');
});