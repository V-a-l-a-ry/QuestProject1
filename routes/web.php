<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InternController;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\GroupController;
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

Auth::routes();









Route::middleware('can:admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashController::class, 'index'])->name('dashboard')->middleware('auth');

    Route::get('Group/index', [App\Http\Controllers\GroupController::class, 'index'])->middleware('auth')->name('group.index');
    Route::post('create', [App\Http\Controllers\GroupController::class, 'store'])->name('create.group');


    Route::post('/assign', [App\Http\Controllers\GroupController::class, 'assignTask'])->middleware('auth')->name('assign.task');


    // For web routes
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



Route::get('/internDashboard', [InternController::class, 'index'])->name('internDashboard');

