<?php

use App\Http\Controllers\Auth\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/register', [RegisterController::class, 'getRegister'])->name('register.form');

Route::get('/login', [LoginController::class, 'getLogin'])->name('login.form');