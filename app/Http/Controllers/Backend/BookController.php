<?php

namespace App\Http\Controllers\Backend;

use App\Models\Book;
use App\Models\Country;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaUploader;
use App\Http\Helpers\SlugGenerator;
use Carbon\Carbon;

class BookController extends Controller
{
    use MediaUploader, SlugGenerator;
    /**
     * * VALIDATION RULES
     */
    private $rules = [
        'name' => 'required',
        'price' => 'required_if:type,==,1',
        'country' => 'required',
        'classRoom' => 'required',
        'thumbnail' => 'required|mimes:jpg,png,webp,jpeg',
        'book' => 'mimes:jpg,png,webp,jpeg,pdf',

    ];
    private $msg = [
        'price.required_if' => "Please enter selling price"
    ];


    //* ADD BOOKS VIEW
    public function addBook()
    {
        $countries = Country::select('id', 'name')->get();

        return view('backend.books.addBooks', compact('countries'));
    }
    /**
     * * STORE A BOOK
     */
    public function storeBook(Request $request)
    {


        //* validation
        $request->validate($this->rules, $this->msg);

        //* STORING FILES ON SERVER
        $thumbnail = $this->uploadSingleMedia($request->thumbnail, 'thumbnails', str($request->name)->slug());

        if ($request->hasFile('demoPdf')) {

            $dummyFile = $this->uploadSingleMedia($request->demoPdf, 'demos', null, 'public');
        }
        if ($request->hasFile('book')) {
            $bookFile = $this->uploadSingleMedia($request->book, 'books', null, 'local');
        }

        //* BOOK STORE
        $book = new Book();
        $book->user_id = $request->author;
        $book->country_id = $request->country;
        $book->class_room_id = $request->classRoom;
        $book->title = $request->name;
        $book->slug =  $this->getSlug($request, Book::class);
        $book->detail = $request->detail;
        $book->isPaid = $request->type ?? false;
        $book->price = $request->price;
        $book->selling_price = $request->sellPrice;
        $book->lang = $request->lang;
        $book->thumbnail = $thumbnail['url'];
        $book->thumbnail_path = $thumbnail['name'];
        $book->dummy_pdf = $request->hasFile('dummyPdf') ?  $dummyFile : null;
        if ($request->hasFile('book')) {
            $book->book_pdf = $bookFile;
        }
        $book->is_ebook = $request->isEbook;
        $book->format = $request->format;
        $book->dimension = $request->dimension;
        $book->publication_date = $request->publication_date;
        $book->total_pages = $request->totalPages;
        $book->is_featured = $request->isFeatured ?? false;
        $book->save();
        notify()->success('Book Successfully inserted');
        return back();
    }
    /**
     * * GET ALL BOOKS
     */
    function getAllBook()
    {
        $query= Book::query();



        $books = $query->select('id','class_room_id', 'title','slug', 'price','selling_price', 'is_ebook', 'thumbnail')->classRoomName()->paginate(20);
        return view('backend.books.allBook',compact('books'));
    }

    /**
     * * EDIT BOOK
     */
    public function editBook($id)
    {   
        $countries = Country::latest()->get();
        $classes = ClassRoom::latest()->get();
        $book = Book::find($id);
        return view('backend.books.editBooks',compact('book','countries','classes'));
    }
}
