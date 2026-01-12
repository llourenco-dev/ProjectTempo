<?php

use App\Http\Controllers\Auth\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UsersController::class, 'getRegister'])->name('register.form');
Route::post('/register', [UsersController::class, 'register'])->name('register');

Route::get('/login', [UsersController::class, 'getLogin'])->name('login.form');
Route::post('/login', [UsersController::class, 'login'])->name('login');

Route::post('/logout', [UsersController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
