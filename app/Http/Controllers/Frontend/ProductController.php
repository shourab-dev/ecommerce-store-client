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
                ->getAuthorName()->subjectName()->classroomName()->paginate(12);
                // dd($relatedBooks);
            return view('frontend.shop');

            
        }
    }
}
