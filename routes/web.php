<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('authorization.login');
});


Route::get('/register', function () {

    return view('authorization.register');
});


Route::get('/reset', function () {

    return view('authorization.reset-password');
});


Route::get('/newpass', function () {

    return view('authorization.new-password');
});


Route::get('/confirmation', function () {

    return view('authorization.email-confirmation');
});



Route::get('/resetconfirmation', function () {

    return view('authorization.reset-confirmation');
});



Route::get('/registerconfirmation', function () {

    return view('authorization.register-confirmation');
});


Route::get('/worldwide', function () {

    return view('dashboard.worldwide');
})->name('worldwide');

Route::get('/country', function () {

    return view('dashboard.country');
})->name('country');
