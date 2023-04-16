<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConfirmationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
    Route::get('/confirmation', 'emailconfirm')->middleware('auth')->name('verification.notice');

    Route::get('/reset', 'reset')->name('confirmation.reset');
    Route::get('/newpass', 'newpass')->name('confirmation.new_password');
    Route::get('/resetconfirmation', 'resetconfirmation')->name('confirmation.reset_confirmation');

    Route::get('/registerconfirmation', 'registerconfirmation')->middleware('guest')->name('confirmation.register_confirmation');

});



Route::controller(DashboardController::class)->group(function () {
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/worldwide', 'worldwide')->name('dashboard.worldwide');
        Route::get('/country', 'country')->name('dashboard.country');
    });
});



Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    auth()->logout();

    return to_route('confirmation.register_confirmation');

})->middleware(['auth', 'signed'])->name('verification.verify');
