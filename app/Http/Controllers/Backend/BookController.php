<?php

namespace App\Http\Controllers\Backend;

use App\Models\Book;
use App\Models\Country;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaUploader;

use Carbon\Carbon;

class BookController extends Controller
{
    use MediaUploader;
    /**
     * * VALIDATION RULES
     */
    private $rules = [
        'name' => 'required',
        'price' => 'required_if:type,==,1',
        'country' => 'required',
        'classRoom' => 'required',
        'subject' => 'required',
        'thumbnail' => 'required|mimes:jpg,png,webp,jpeg',
        'book' => 'required|mimes:jpg,png,webp,jpeg,pdf',

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

    public function storeBook(Request $request)
    {


        //* validation
        $request->validate($this->rules, $this->msg);
        //* STORING FILES ON SERVER
        $thumbnail = $this->uploadSingleMedia($request->thumbnail, 'thumbnails');
        if ($request->hasFile('demoPdf')) {

            $dummyFile = $this->uploadSingleMedia($request->demoPdf, 'demos');
        }
        $bookFile = $this->uploadSingleMedia($request->book, 'books', 'local');

        //* BOOK STORE
        $book = new Book();
        $book->user_id = auth()->user()->id;
        $book->country_id = $request->country_id;
        $book->class_room_id = $request->class_room_id;
        $book->subject_id = $request->subject_id;
        $book->title = $request->name;
        $book->detail = $request->detail;
        $book->isPaid = $request->type;
        $book->price = $request->price;
        $book->selling_price = $request->sellPrice;
        $book->lang = $request->lang;
        $book->thumbnail = $thumbnail;
        $book->dummy_pdf = $request->hasFile('dummyPdf') ?  $dummyFile : null;
        $book->book_pdf = $bookFile;
        $book->save();
        dd($book);
    }


    private function uploadMedia($media, $path = 'books')
    {
        $name = str($media->getClientOriginalName() . '-' . Carbon::today()->format("d-m-y"))->slug() . '.' . $media->getClientOriginalExtension();
        $media->storeAs($path, $name, 'public');
        return $name;
    }
}
