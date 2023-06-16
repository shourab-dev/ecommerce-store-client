<?php

namespace App\Http\Controllers\Customer;

use App\Models\Book;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerOrderController extends Controller
{
    /**
     * * GET ALL CUSTOMER ORDERED E-BOOK
     */
    function getMyBooks() {
        $user = Customer::where('id',auth()->guard('user')->user()->id)->select('id')->with('orderedBooks')->first();
        $orderItemsIds = $user->orderedBooks->pluck('book_id');
        $query = Book::query();
        if(request()->routeIs('user.myorder.ebook')){
            $query->whereIn('id', $orderItemsIds);
        }
        else{
            $query->whereIn('id', $orderItemsIds)->where('is_ebook', false);
        }
        $orderBooks = $query->select('id', 'user_id', 'class_room_id', 'subject_id', "title", "slug", "thumbnail")->classRoomName()->subjectName()->get();
        dd($orderBooks);
    }

    
}
