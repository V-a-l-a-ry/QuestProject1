<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InternController;
use Illuminate\Support\Facades\Gate;

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
});










Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth');
Route::post('/profile', [ProfileController::class, 'update'])->middleware('auth');



Route::get('/internDashboard', [InternController::class, 'index'])->name('internDashboard');

