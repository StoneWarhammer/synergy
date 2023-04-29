<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'destroy'])->name('logout');
    Route::get('/profile', [\App\Http\Controllers\Profile\ProfileController::class, 'index'])->name('profile');
    Route::post('/validate_image', [\App\Http\Controllers\Profile\ProfileController::class, 'validate_image'])->name('validate_image');
    Route::view('/', 'mainpage')->name('welcome');
    Route::post('/update_password', [\App\Http\Controllers\Profile\ProfileController::class, 'update_password'])->name('update_password');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'store']);

    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'create'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'store']);

    Route::get('/forgot-password', [\App\Http\Controllers\Auth\ForgotPassword::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [\App\Http\Controllers\Auth\ForgotPassword::class, 'store'])->name('password.email');

    Route::get('/reset-password', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'store'])->name('password.update');
});








