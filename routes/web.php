<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function(){
    return view('auth.register');
});

Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile_auth', [ProfileController::class, 'index2']);
Route::post('register', [Authentication::class, 'register']);
Route::post('login', [Authentication::class, 'login']);
Route::post('save_changes', [ProfileController::class, 'save_changes']);
