<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('', [DashboardController::class, 'index'])->name('dashboard');
// Route::resource('ideas',IdeaController::class);

Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['show']);

Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users',UserController::class)->only('show','edit','update')->middleware('auth');

Route::get('profile',[UserController::class,'profile'])->middleware('auth')->name('profile');


// Route::group(['prefix' => 'ideas/', 'as' => 'ideas.'],function(){

//     Route::post('', [IdeaController::class, 'store'])->name('store')->withoutMiddleware('auth');

//     Route::get('/{idea}', [IdeaController::class, 'show'])->name('show')->withoutMiddleware('auth');

//         Route::group(['middleware'=>['auth']],function(){

//             Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');

//             Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');

//             Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');

//             Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
//         });
// });



Route::get('/register', [AuthController::class , 'register'] )->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class , 'login'] )->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/terms', function () { //Direct Closure Route
    return view('terms');
});


// Route::post('/idea', [DashboardController::class, 'index']);

// Route::get('/profile', [ProfileController::class, 'index']); //Controller Route


// Route::get('/register', [RegisterController::class, 'index']);
// Register Controller should be deleted as well.


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/profile', function () {
//     return view('users.profile'); //users/profile is aceptable too but . is better due to the name convention by Laravel
// });

// Route::get('/info', function () {
//     return view('info');
// });
