<?php

use Illuminate\Support\Facades\Route;



Route::group(['middleware' => 'role'], function () {
    Route::get('/events/create', [\App\Http\Controllers\Events\EventsController::class, 'create'])->name('events_create');
    Route::post('/events/create', [\App\Http\Controllers\Events\EventsController::class, 'store'])->name('events_store');
    Route::get('/answers/{event}', [\App\Http\Controllers\Answers\AnswerController::class, 'index'])->name('answers');
    Route::get('/answer/{answer}', [\App\Http\Controllers\Answers\AnswerController::class, 'show'])->name('answers_show');
    Route::post('/answer/{answer}', [\App\Http\Controllers\Answers\AnswerController::class, 'store'])->name('answers_store');

    Route::get('/post-create', [\App\Http\Controllers\Posts\PostController::class, 'create'])->name('post_create');
    Route::post('/post-create', [\App\Http\Controllers\Posts\PostController::class, 'store'])->name('post_store');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'destroy'])->name('logout');
    Route::get('/profile', [\App\Http\Controllers\Profile\ProfileController::class, 'index'])->name('profile');
    Route::post('/passport_update', [\App\Http\Controllers\Profile\ProfileController::class, 'edit_passport'])->name('edit_passport');
    Route::post('/validate_image', [\App\Http\Controllers\Profile\ProfileController::class, 'validate_image'])->name('validate_image');
    Route::get('/', [\App\Http\Controllers\Posts\PostController::class, 'index'])->name('welcome');
    Route::get('/events', [\App\Http\Controllers\Events\EventsController::class, 'index'])->name('events');
    Route::get('/events/{event}', [\App\Http\Controllers\Events\EventsController::class, 'show'])->name('events_show');
    Route::post('/events/{event}', [\App\Http\Controllers\Events\EventsController::class, 'show_store'])->name('events_show_store');
    Route::post('/update_password', [\App\Http\Controllers\Profile\ProfileController::class, 'update_password'])->name('update_password');
    Route::get('/posts/{post}', [\App\Http\Controllers\Posts\PostController::class, 'show'])->name('post_show');
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








