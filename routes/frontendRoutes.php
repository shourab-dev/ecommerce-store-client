<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::name('frontend.')->controller(HomeController::class)->group(function () {
    //* HOME PAGE
    Route::get('/',  'index')->name('home');
    //* GET DISCOUNT PRODUCT
    Route::get('/product/sales/{limit?}', 'onSaleProducts')->name('onSale');
});
