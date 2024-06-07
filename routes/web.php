<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', function () {
    return view('users.profile'); //users/profile is aceptable too but . is better due to the name convention by Laravel
});

Route::get('/info', function () {
    return view('info');
});
