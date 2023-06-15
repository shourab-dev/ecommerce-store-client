<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function show($slug = null)
    {
        if ($slug) {

            $book = Book::where('slug', $slug)->getAuthorName()->first();
            $relatedBooks = Book::where('class_room_id', $book->class_room_id)->orWhere('subject_id', $book->subject_id)->take(8)->select('id', 'slug', 'subject_id', 'class_room_id', 'user_id', 'title', 'thumbnail', 'is_featured', 'price', 'selling_price')
                ->getAuthorName()->subjectName()->classroomName()->get();
            return view('frontend.singleProduct', compact('book', 'relatedBooks'));
        } else {
            $book = null;
            $relatedBooks =  Book::select('id', 'slug', 'subject_id', 'class_room_id', 'user_id', 'title', 'thumbnail', 'is_featured', 'price', 'selling_price')
                ->getAuthorName()->subjectName()->classroomName()->filterBooks(request())->orderByType(request()->orderby)->latest()->paginate(12);
            return view('frontend.shop', compact('relatedBooks'));
        }
    }


    public function getBooksByClassOrSubject(Request $req, $slug)
    {
        $query = Book::query();
        if ($req->routeIs('frontend.product.class')) {
            $query->whereHas('class', function ($q) use ($req) {
                $q->where('slug', $req->slug);
            });
        } else if ($req->routeIs('frontend.product.subject')) {
            $query->whereHas('subject', function ($q) use ($req) {
                $q->where('slug', $req->slug);
            });
        }

        $relatedBooks = $query->orderByType(request()->orderby)->latest()->paginate(12);
        return view('frontend.shop', compact('relatedBooks'));
    }



    //* GET SEARCH VIA AJAX
    public function getSearchResultsViaAjax(Request $req)  {
        $search = $req->search;

        $books = Book::where('title', 'LIKE', "%".$search."%")->classRoomName()->subjectName()->select('title', 'class_room_id', 'subject_id', 'thumbnail','slug')->take(5)->get();
        return response(json_encode($books), 200);

    }
}
