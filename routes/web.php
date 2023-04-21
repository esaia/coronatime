<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConfirmationController;

Route::controller(SessionController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::view('/login', 'authorization.login')->name('login');
        Route::post('/login', 'store')->name('login.store');
    });

    Route::post('/logout', 'destroy')->name('logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::view('/register', 'authorization.register')->name('register');
        Route::post('/register', 'store')->name('register.store');

    });
});


Route::post('/language', [LanguageController::class, 'index'])->name('language');


Route::controller(ConfirmationController::class)->group(function () {
    Route::get('/email/verify/{id}/{hash}', 'verify')->middleware(['auth', 'signed'])->name('verification.verify');
    Route::view('/confirmation', 'authorization.verify.email-confirmation')->middleware('auth')->name('verification.notice');
    Route::get('/reset-confirmation', 'resetConfirmation')->name('confirmation.reset_confirmation');

    Route::middleware('guest')->group(function () {
        Route::view('/confirm', 'authorization.verify.password-confirmation')->name('password_verify');
        Route::view('/reset', 'authorization.reset-password')->name('password.request');
        Route::post('/forgot-password', 'resetPassword')->name('password.email');
        Route::get('/reset-password/{token}', 'newPass')->name('password.reset');
        Route::post('/reset-password', 'update')->name('password.update');
        Route::get('/register-confirmation', 'registerConfirmation')->name('confirmation.register_confirmation');
    });

});



Route::controller(DashboardController::class)->group(function () {
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::redirect('/', '/worldwide')->name('home');
        Route::get('/worldwide', 'worldwide')->name('dashboard.worldwide');
        Route::get('/country', 'country')->name('dashboard.country');
    });
});
