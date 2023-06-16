<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Customer\CustomerOrderController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//* ALL CUSTOMER ROUTES

Route::get('login', [UserAuthController::class, 'userLogin'])->name('user.login');
Route::post('login', [UserAuthController::class, 'handleUserLogin'])->name('user.login.check');

Route::middleware(['isUser'])->prefix('/dashboard')->name('user.')->group(function () {


    //* CUSTOMER DASHBOARD URL
    Route::get('/', [UserAuthController::class, 'dashboard'])->name('dashboard');

    //* CUSTOMER PURCHASE PRODUCT URL
    Route::prefix('my-orders')->name('myorder.')->controller(CustomerOrderController::class)->group(function () {
        Route::get('/ebook', 'getMyBooks')->name('ebook');
        Route::get('/', 'getMyBooks')->name('physical');
    });
});
