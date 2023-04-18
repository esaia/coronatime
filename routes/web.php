<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConfirmationController;

Route::controller(SessionController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'store')->name('login.store');
    });

    Route::post('/logout', 'destroy')->name('logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', 'index')->name('register');
        Route::post('/register', 'store')->name('register.store');

    });
});


Route::controller(ConfirmationController::class)->group(function () {
    Route::get('/email/verify/{id}/{hash}', 'verify')->middleware(['auth', 'signed'])->name('verification.verify');


    Route::get('/confirmation', 'emailconfirm')->middleware('auth')->name('verification.notice');
    Route::get('/confirm', 'passwordconfirm')->middleware('guest')->name('password_verify');

    Route::get('/reset', 'reset')->middleware('guest')->name('password.request');
    Route::post('/forgot-password', 'resetPassword')->middleware('guest')->name('password.email');

    Route::get('/reset-password/{token}', 'newPass')->middleware('guest')->name('password.reset');
    Route::post('/reset-password', 'update')->middleware('guest')->name('password.update');


    Route::get('/reset-confirmation', 'resetConfirmation')->name('confirmation.reset_confirmation');
    Route::get('/register-confirmation', 'registerConfirmation')->middleware('guest')->name('confirmation.register_confirmation');

});



Route::controller(DashboardController::class)->group(function () {
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/worldwide', 'worldwide')->name('dashboard.worldwide');
        Route::get('/country', 'country')->name('dashboard.country');
    });
});
