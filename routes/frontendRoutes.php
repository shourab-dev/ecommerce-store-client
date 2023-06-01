<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\Frontend\HomeController;

use Illuminate\Support\Facades\Route;

Route::name('frontend.')->controller(HomeController::class)->group(function () {
    //* HOME PAGE
    Route::get('/',  'index')->name('home');
    //* GET DISCOUNT PRODUCT
    Route::get('/product/sales/{limit?}', 'onSaleProducts')->name('onSale');
});


//* CART ROUTE
Route::middleware('isUser')->controller(CartController::class)->name('cart.')->group(function () {
    Route::get('/cart/{productId}', 'addToCart')->name('add');
    Route::get('/carts', 'getAllCart')->name('all');
    Route::get('/carts/remove/{id}', 'removeCartItem')->name('remove');
});
