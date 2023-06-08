<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use App\Models\User;
use App\Models\Customer;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Helpers\BestSellingBook;

class HomeController extends Controller
{
    use BestSellingBook;
    public function index()
    {


        $mostSellingBooks = $this->getBestSellingBooks(6)->classroomName()->subjectName()->with('author:id,name')->get();
    // dd($mostSellingBooks);        

        $featuredBooks = Book::where('is_featured', 1)->latest()->select('id', 'subject_id', 'class_room_id', 'user_id', 'title', 'thumbnail', 'is_featured', 'price', 'selling_price')
            ->getAuthorName()->subjectName()->classroomName()->take(12)->get();
        $newBooks = Book::latest()->select('id', 'subject_id', 'class_room_id', 'user_id', 'title', 'thumbnail', 'is_featured', 'price', 'selling_price')
            ->getAuthorName()->subjectName()->classroomName()->take(8)->get();

        $authors = User::has('books')->select('id', 'name')->withCount('books as numOfBooks')->get();


        return view('frontend.index', compact('featuredBooks', 'newBooks', 'authors', 'mostSellingBooks'));
    }



    /**
     * *GET ALL ON SALES PRODUCTS
     */

    public function onSaleProducts($limit = null)
    {
        $discountProducts = Book::where('selling_price', '!=', null)->latest()->select('id', 'subject_id', 'class_room_id', 'user_id', 'title', 'thumbnail', 'is_featured', 'price', 'selling_price')
            ->getAuthorName()->subjectName()->classroomName()->limit($limit ?? 12)->get();
        return response(json_encode($discountProducts), 200);
    }
}
