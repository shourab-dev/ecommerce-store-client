<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use App\Models\User;
use App\Models\About;
use App\Models\Customer;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Helpers\BestSellingBook;
use App\Models\Pages;

class HomeController extends Controller
{
    use BestSellingBook;
    public function index()
    {


        $mostSellingBooks = $this->getBestSellingBooks(6)->where('status', 1)->classroomName()->with('author:id,name')->get();


        $featuredBooks = Book::where('is_featured', 1)->where('type', 0)->where('status', 1)->latest()->select('id', 'slug', 'subject_id', 'class_room_id', 'user_id', 'title', 'thumbnail', 'is_featured', 'price', 'selling_price', 'created_at')
            ->getAuthorName()->classroomName()->take(12)->get();
        $newBooks = Book::where('status', 1)->where('type', 0)->latest()->select('id', 'slug', 'subject_id', 'class_room_id', 'user_id', 'title', 'thumbnail', 'is_featured', 'price', 'selling_price')
            ->getAuthorName()->classroomName()->take(8)->get();


        $authors = User::has('books')->select('id', 'name')->withCount('books as numOfBooks')->get();


        return view('frontend.index', compact('featuredBooks', 'newBooks', 'authors', 'mostSellingBooks'));
    }



    /**
     * *GET ALL ON SALES PRODUCTS
     */

    public function onSaleProducts($limit = null)
    {
        $discountProducts = Book::where('selling_price', '!=', null)->where('status', 1)->latest()->select('id', 'slug', 'subject_id', 'class_room_id', 'user_id', 'title', 'thumbnail', 'is_featured', 'price', 'selling_price')
            ->getAuthorName()->classroomName()->limit($limit ?? 12)->get();
        return response(json_encode($discountProducts), 200);
    }



    /**
     * * ABOUT PAGE
     */

    function aboutPage()
    {
        $about = About::first();
        return view('frontend.about', compact('about'));
    }

    /**
     * * RETURN POLICY
     */
    function frontendPages($type)
    {
        $pages =  Pages::where('type', $type)->first();
        return view('frontend.returnPolicy', compact('pages', 'type'));
    }
}
