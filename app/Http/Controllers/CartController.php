<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function addToCart($productId)
    {
        
        $book = Book::where('id', $productId)->select('id', 'title', 'thumbnail', 'isPaid', 'price', 'selling_price')->first();

        if ($book->isPaid == 0) {
            $bookPrice = 0;
        } else {
            if ($book->selling_price) {
                $bookPrice = $book->selling_price;
            } else {
                $bookPrice = $book->price;
            }
        }
    
        $cart = Cart::create([
            'customer_id' => auth()->guard('user')->user()->id,
            'book_id' => $book->id,
            'price' => $bookPrice,
        ]);
        $totalCart = Cart::where('customer_id', auth()->guard('user')->user()->id)->count();
        return response(json_encode(["title" => $book->title, "cartCount" => $totalCart]), 200);
    }
}
