<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
//When such a request is made, Laravel will instantiate the DashboardController class and call its index method.

// Route::post('/idea', [DashboardController::class, 'index']);
Route::post('/idea', [IdeaController::class, 'store'])->name('idea.create');

Route::get('/profile', [ProfileController::class, 'index']); //Controller Route

Route::get('/terms', function () { //Direct Closure Route
    return view('terms');
});
Route::get('/register', [RegisterController::class, 'index']);


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/profile', function () {
//     return view('users.profile'); //users/profile is aceptable too but . is better due to the name convention by Laravel
// });

// Route::get('/info', function () {
//     return view('info');
// });
