<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $featuredBooks = Book::where('is_featured', 1)->latest()->select('id', 'subject_id', 'class_room_id', 'user_id', 'title', 'thumbnail', 'is_featured', 'price', 'selling_price')
            ->getAuthorName()->subjectName()->classroomName()->take(8)->get();


        return view('frontend.index', compact('featuredBooks'));
    }



    /**
     * *GET ALL ON SALES PRODUCTS
     */

    public function onSaleProducts($limit = null)
    {
        $discountProducts = Book::where('selling_price', '!=', null)->latest()->select('id', 'subject_id', 'class_room_id', 'user_id', 'title', 'thumbnail', 'is_featured', 'price', 'selling_price')
            ->getAuthorName()->subjectName()->classroomName()->limit($limit ?? 8)->get();
        return response(json_encode($discountProducts), 200);
    }
}
