<?php

use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\Backend\ClassRoomController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\Backend\QuestionPaperController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SubjectController;
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
        Route::post('/update/{id}', 'updateRole')->name('update');
        Route::get('/authors', 'getAuthors')->name('authors');


        //* USER MANAGEMENT
        Route::prefix('/users')->name('user.')->group(function(){
            Route::GET('/', 'getAllUsers')->name('all');
        });
    });


    //* COUNTRY ROUTES
    Route::controller(CountryController::class)->prefix('admin/country')->name('admin.country.')->group(function () {
        Route::get('/add', 'addCountry')->name('add');
        Route::post('/store', 'storeCountry')->name('store');
        Route::get('/edit/{editedCountry}', 'editCountry')->name('edit');
        Route::post('/update/{country}', 'updateCountry')->name('update');
    });


    //* CLASS ROOM ROUTES
    Route::controller(ClassRoomController::class)->prefix('admin/class-room')->name('admin.class.')->group(function () {
        Route::get('/add', 'addClassRoom')->name('add');
        Route::post('/store', 'storeClassRoom')->name('store');
        Route::get('/edit/{editedClassRoom}', 'editClassRoom')->name('edit');
        Route::post('/update/{classRoom}', 'updateClassRoom')->name('update');
    });

    //* Subject ROUTES
    Route::controller(SubjectController::class)->prefix('admin/subjects')->name('admin.subject.')->group(function () {
        Route::get('/add', 'addSubject')->name('add');
        Route::post('/store', 'storeSubject')->name('store');
        Route::get('/edit/{editedSubject}', 'editSubject')->name('edit');
        Route::post('/update/{subject}', 'updateSubject')->name('update');
    });


    //* QUESTION PAPER ROUTES
    Route::controller(QuestionPaperController::class)->prefix('admin/questions/')->name('admin.questions.')->group(function () {
        Route::get('/', 'getAllQuestions')->name('all');
        Route::get('/classes', 'getClasses')->name('classes');
        Route::get('/subjects', 'getSubjects')->name('subjects');
        Route::get('/filter', 'filterQuestions')->name('filter');
        Route::get('/create', 'createQuestions')->name('create');
        Route::post('/create', 'storeQuestions')->name('store');
        Route::get('/show/{id}', 'getQuestion')->name('show');
    });



    //* BOOKS ROUTES 
    Route::controller(BookController::class)->prefix('admin/books/')->name('admin.books.')->group(function () {
        Route::get('/', 'addBook')->name('create');
        Route::post('/', 'storeBook')->name('store');
    });



    //* ORDERS ROUTES
    Route::controller(OrderController::class)->prefix('admin/orders/')->name('admin.orders.')->group(function(){
        Route::get('/', 'getOrders')->name('all');
        Route::get('/view/{orderId}', 'viewOrders')->name('view');
    });

});
