<?php

use App\Http\Controllers\Backend\QuestionPaperController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Bakend\CountryController;

/**
 * ALL ADMIN ROUTES
 */
Auth::routes();

Route::middleware(['isAdmin', 'auth'])->group(function () {


    Route::get('/home', [HomeController::class, 'index'])->name('home');
    //* ROLE ROUTES
    Route::controller(RoleController::class)->prefix('role/')->name('role.')->group(function () {

        //*  GET ALL ROLES
        Route::get('/all', 'allRoles')->name('all');
        Route::POST('/store', 'storeRole')->name('store');
        Route::get('/edit/{id}', 'editRole')->name('edit');
        
    });


    //* COUNTRY ROUTES
    Route::controller(CountryController::class)->prefix('admin/country')->name('admin.country.')->group(function () {
        Route::get('/add', 'addCountry')->name('add');
        Route::post('/store', 'storeCountry')->name('store');
        Route::get('/edit/{editedCountry}', 'editCountry')->name('edit');
        Route::post('/update/{country}', 'updateCountry')->name('update');
    });


    //* QUESTION PAPER ROUTES
    Route::controller(QuestionPaperController::class)->prefix('admin/questions/')->name('admin.questions.')->group(function () {
        Route::get('/', 'getAllQuestions')->name('all');
        Route::get('/filter', 'filterQuestions')->name('filter');
    });
});
