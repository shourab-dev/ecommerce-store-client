<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Client\ResponseSequence;

class CartController extends Controller
{
    /**
     * * ADD TO CART
     */
    public function addToCart(Request $req,$productId)
    {
        
        $hasAlreadyOrdered = OrderItem::whereHas('book', function ($q) {
            $q->where('is_ebook', 1);
        })->where('book_id', $productId)->whereHas('order', function ($q) {
            $q->where('customer_id', auth()->guard('user')->user()->id);
        })->exists();



        $book = Book::where('id', $productId)->select('id', 'title',  'isPaid', 'price', 'selling_price', 'is_ebook')->first();
        if ($hasAlreadyOrdered == true) {
            return response(json_encode(["title" => $book->title, "msg" => 'You have already purchased ']), 200);
            exit();
        }
        /**
         * !CART PRICE SET [MAY BE DELETE IN NEXT VERSION]
         */
        if ($book->isPaid == 0) {
            $bookPrice = 0;
        } else {
            if ($book->selling_price) {
                $bookPrice = $book->selling_price;
            } else {
                $bookPrice = $book->price;
            }
        }
        /** CART PRICE SET */

        //* ADDING ITEMS TO CART
        $isAdded = Cart::where('book_id', $book->id)->where('customer_id', auth()->guard('user')->user()->id)->exists();
        if ($isAdded) {
            
            if($book->is_ebook == 0){
                Cart::where('book_id', $book->id)->where('customer_id', auth()->guard('user')->user()->id)->update(['amount' => abs($req->amount)]);
            }

        } else {
            
            Cart::create([
                'customer_id' => auth()->guard('user')->user()->id,
                'book_id' => $book->id,
                'price' => $bookPrice,
                'amount' => abs($req->amount)
            ]);
        }
        // $cart = Cart::updateOrCreate([
        //     'book_id' => $book->id,
        //     'customer_id' => auth()->guard('user')->user()->id,
        // ], [
        //     'customer_id' => auth()->guard('user')->user()->id,
        //     'book_id' => $book->id,
        //     'price' => $bookPrice,
        // ]);
        $totalCart = Cart::where('customer_id', auth()->guard('user')->user()->id)->count();
        return response(json_encode(["title" => $book->title, "cartCount" => $totalCart]), 200);
    }

    /**
     * * GET ALL CART
     */

    public function getAllCart()
    {
        //* AUTH ID
        $authId =  auth()->guard('user')->user()->id;
        //* GET USER CART DATA
        $carts = Cart::with(['books' => function ($query) {
            $query->select('id', "user_id", "title", "slug", "price", "isPaid", "selling_price", "thumbnail")->getAuthorName();
        }])->where('customer_id', $authId)->latest()->get();


        //* GET CART TOTAL PRICE
        $totalPrice = Book::getCartSubTotal($authId);

        //* COMPACTING DATA
        $data = ["carts" => $carts, "totalPrice" => $totalPrice];
        return response(json_encode($data), 200);
    }



    public function getAllCartsItems()
    {
        //* AUTH ID
        $authId =  auth()->guard('user')->user()->id;
        //* GET USER CART DATA
        $carts = Cart::with(['books' => function ($query) {
            $query->select('id', "user_id", "title", "slug", "price", "isPaid", "selling_price", "thumbnail")->getAuthorName();
        }])->where('customer_id', $authId)->latest()->get();


        //* GET CART TOTAL PRICE


        // $dis = Book::getCartDiscountPrice($authId);

        $totalPrice = Book::getCartSubTotal($authId);



        //* COMPACTING DATA
        $data = ["carts" => $carts, "totalPrice" => $totalPrice];
        return view('frontend.cart', compact('data'));
    }


    /**
     * * DELETE ITEMS FROM CART
     */

    public function removeCartItem($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return back();
    }
}
