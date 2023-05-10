<?php

use App\Http\Controllers\Auth\UserAuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//* ALL CUSTOMER ROUTES

Route::get('login', [UserAuthController::class,'userLogin'])->name('user.login');
Route::post('login', [UserAuthController::class,'handleUserLogin'])->name('user.login.check');

Route::middleware(['auth', 'isUser'])->name('user.')->controller(UserAuthController::class)->group(function () {


    //* CUSTOMER DASHBOARD URL

    Route::get('/dashboard', 'dashboard')->name('dashboard');
});
