<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
//When such a request is made, Laravel will instantiate the DashboardController class and call its index method.
Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store');

Route::delete('/ideas/{id}', [IdeaController::class, 'destroy'])->name('ideas.destroy');




Route::get('/terms', function () { //Direct Closure Route
    return view('terms');
});


// Route::post('/idea', [DashboardController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index']); //Controller Route


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
