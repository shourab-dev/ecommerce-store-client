<?php

use App\Http\Controllers\Backend\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/**
 * ALL ADMIN ROUTES
 */
Auth::routes();

Route::middleware(['isAdmin', 'auth'])->group(function () {


    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::controller(RoleController::class)->prefix('role/')->name('role.')->group(function () {

        //*  GET ALL ROLES
        Route::get('/all', 'allRoles')->name('all');
        Route::POST('/store', 'storeRole')->name('store');
    });
});
