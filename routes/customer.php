<?php

use App\Http\Controllers\Auth\UserAuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//* ALL CUSTOMER ROUTES


Route::name('user.')->controller(UserAuthController::class)->group(function () {

    Route::get('/login', 'userLogin')->name('login');
    Route::post('/login', 'handleUserLogin')->name('login.check');

    //* CUSTOMER DASHBOARD URL

    Route::get('/dashboard', 'dashboard')->name('dashboard');
});
