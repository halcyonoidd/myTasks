<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('register', function () {
    return view('register');
})->name('register')->middleware('guest');

Route::post('register', [AuthController::class, 'register'])->name('register.post');

Route::get('login', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::post('login', [AuthController::class, 'login'])->name('login.post');

Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');