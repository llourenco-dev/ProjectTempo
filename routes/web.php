<?php

use App\Http\Controllers\Auth\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UsersController::class, 'getRegister'])->name('register.form');
Route::post('/register', [UsersController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'getLogin'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
