<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AuthorController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Customer\CustomerOrderController;
use App\Http\Controllers\Frontend\QuestionPaperController;

Route::name('frontend.')->controller(HomeController::class)->group(function () {
    //* HOME PAGE
    Route::get('/',  'index')->name('home');
    //* GET DISCOUNT PRODUCT
    Route::get('/product/sales/{limit?}', 'onSaleProducts')->name('onSale');
});

Route::name('frontend.product.')->controller(ProductController::class)->group(function () {
    //* ROUTE PRODUCT VIEW 
    Route::get('/books/{slug?}', 'show')->name('show');

    //* ROUTE FOR CLASSROOM & SUBJECT WITH BOOKS
    Route::get('/class/{slug}', 'getBooksByClassOrSubject')->name('class');
    Route::get('/subject/{slug}', 'getBooksByClassOrSubject')->name('subject');

    //* ROUTE FOR SEARCH
    Route::get("/search", 'getSearchResultsViaAjax')->name('search');
});

Route::name('frontend.author.')->controller(AuthorController::class)->group(function () {
    //* ROUTE GET AUTHOR ALL BOOKS
    Route::get('/author/{id}', 'getBooksByAuthor')->name('all');
});


//*  QUESTION PAPER ROUTES

Route::name('frontend.questions.')->middleware('isQuestion')->prefix('/questions/')->controller(QuestionPaperController::class)->group(function () {
    Route::get('/', 'getAllQuestions')->name('all');
    Route::get('/view/{slug}', 'getAQuestion')->name('single');
    Route::get('/view-pdf/{id}', 'viewQuestionPDF')->name('pdf');
});






//* CART ROUTE
Route::middleware('isUser')->controller(CartController::class)->name('cart.')->group(function () {
    Route::get('/cart/{productId}', 'addToCart')->name('add');
    Route::get('/carts-ajax', 'getAllCart')->name('all');
    Route::get('/carts', 'getAllCartsItems')->name('all.items');
    Route::get('/carts/remove/{id}', 'removeCartItem')->name('remove');
});




// SSLCOMMERZ Start

Route::post('/checkout', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->name('checkout')->middleware('isUser');
Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

//* DOWNLOAD INVOICE FOR THE SPECIFIC ORDER 
Route::get('/send-invoice/{id}', [CustomerOrderController::class, 'sendOrderInvoice'])->name('send.invoice')->middleware('isUser');
