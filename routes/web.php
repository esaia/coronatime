<?php

use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::controller(SessionController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'index')->name('login.index');
        Route::post('/login', 'store')->name('login.store');
    });
});


Route::controller(RegisterController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', 'index')->name('register.index');
        Route::post('/register', 'store')->name('register.store');

    });
});




Route::controller(ConfirmationController::class)->group(function () {
    Route::get('/confirmation', 'emailconfirm')->name('confirmation.emailconfirm');
    Route::get('/reset', 'reset')->name('confirmation.reset');
    Route::get('/newpass', 'newpass')->name('confirmation.newpass');
    Route::get('/resetconfirmation', 'resetconfirmation')->name('confirmation.resetconfirmation');
    Route::get('/registerconfirmation', 'registerconfirmation')->name('confirmation.registerconfirmation');

});




Route::controller(DashboardController::class)->group(function () {
    Route::get('/worldwide', 'worldwide')->name('dashboard.worldwide');
    Route::get('/country', 'country')->name('dashboard.country');
});
