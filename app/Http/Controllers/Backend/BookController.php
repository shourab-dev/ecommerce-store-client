<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Country;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Helpers\MediaUploader;
use App\Http\Helpers\SlugGenerator;
use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use App\Models\Subject;
use Illuminate\Support\Facades\Storage;

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
        'classRoom' => 'required_without:accesory',
        'accesory' => 'required_without:classRoom',
        'thumbnail' => 'required|mimes:jpg,png,webp,jpeg',
        'book' => 'mimes:jpg,png,webp,jpeg,pdf',
        'productType' => 'required',


    ];
    private $msg = [
        'price.required_if' => "Please enter selling price",
        'classRoom.required_without' => "Category and Accessories can not be empty at the same time!",
        'accesory.required_without' => "Category and Accessories can not be empty at the same time!",
        "productType.required" => "Please select a product type!"
    ];


    //* ADD BOOKS VIEW
    public function addBook()
    {
        $countries = Country::select('id', 'name')->get();
        $accesories = Subject::select('id', 'name')->get();
        return view('backend.books.addBooks', compact('countries', 'accesories'));
    }
    /**
     * * STORE A BOOK
     */
    public function storeBook(Request $request)
    {
        // dd($request->is_ebook);

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
        $book->subject_id = $request->accesory ?? null;
        $book->title = $request->name;
        $book->slug =  $this->getSlug($request, Book::class);
        $book->short_detail = $request->short_detail;
        $book->detail = $request->detail;
        $book->isPaid = $request->type ?? true;
        $book->price = $request->price;
        $book->selling_price = $request->sellPrice;
        $book->lang = $request->lang;
        $book->type = $request->productType;
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

        if ($request->hasFile('galleryImages')) {

            $acceptTypes = ['jpeg', 'png', 'webp', 'jpg'];

            foreach ($request->galleryImages as $gallImg) {
                $ext = $gallImg->getClientOriginalExtension();
                $isValidExt = array_search($ext, $acceptTypes);
                //* IF ERROR FOUND!
                if (!$isValidExt) {
                    return back()->withErrors(['galleryImages' => "Gallery Images extensions are jpeg, png, webp, jpg"]);
                }

                //* NO EXCEPTION OCCRED
                $gallArray = $this->uploadSingleMedia($gallImg, 'gallery');
                GalleryImage::create([
                    "book_id" =>  $book->id,
                    'gall_url' => $gallArray['name'],
                    "gall_path" => $gallArray["url"]
                ]);
            }
        }
        notify()->success('Book Successfully inserted');
        return back();
    }
    /**
     * * GET ALL BOOKS
     */
    function getAllBook()
    {
        $query = Book::query();



        $books = $query->select('id', 'subject_id','class_room_id', 'title', 'slug', 'price', 'selling_price', 'is_ebook', 'thumbnail', 'status', 'is_featured')->subjectName()->classRoomName()->paginate(20);
        
        return view('backend.books.allBook', compact('books'));
    }

    /**
     * * EDIT BOOK
     */
    public function editBook($id)
    {
        $countries = Country::latest()->get();
        $classes = ClassRoom::latest()->get();
        $accesories = Subject::select('id', 'name')->get();
        $book = Book::getAuthorName()->findOrFail($id);

        return view('backend.books.editBooks', compact('book', 'countries', 'classes', 'accesories'));
    }


    /**
     * * UPDATE STATUS
     */
    public function changeStatus($id)
    {
        $book = Book::find($id);

        if ($book->status == 1) {
            $book->status = 0;
        } else {
            $book->status = 1;
        }
        $book->save();
        return response("Book Status has been updated", 200);
    }


    /**
     * * UPDATE BOOK
     */
    public function updateBook(Request $request, $id)
    {
        $book = Book::with('gallery')->findOrFail($id);
        //* validation


        if ($request->thumbnail) {
            //* REMOVE PREVIOUS THUMBNAIL IMAGE
            if (Storage::disk('public')->exists($book->thumbnail_path)) {
                Storage::disk('public')->delete($book->thumbnail_path);
            }
            //* STORING FILES ON SERVER
            $thumbnail = $this->uploadSingleMedia($request->thumbnail, 'thumbnails', str($request->name)->slug());
        }


        if ($request->hasFile('demoPdf')) {
            //* REMOVE PREVIOUS DEMO PDF
            if (Storage::disk('public')->exists($book->dummy_pdf)) {
                Storage::disk('public')->delete($book->dummy_pdf);
            }
            $dummyFile = $this->uploadSingleMedia($request->demoPdf, 'demos', null, 'public');
        }
        if ($request->hasFile('book')) {
            //* REMOVE PREVIOUS DEMO PDF
            if (Storage::disk('local')->exists("books/" . $book->book_pdf)) {
                Storage::disk('local')->delete("books/" . $book->book_pdf);
            }

            $bookFile = $this->uploadSingleMedia($request->book, 'books', null, 'local');
        }

        //* BOOK STORE
      
        $book->country_id = $request->country;
        $book->class_room_id = $request->classRoom;
        $book->subject_id = $request->accesory ?? null;
        $book->title = $request->name;
        $book->slug =  $this->getSlug($request, Book::class);
        $book->short_detail = $request->short_detail;
        $book->detail = $request->detail;
        $book->isPaid = $request->type ?? true;
        $book->price = $request->price;
        $book->selling_price = $request->sellPrice;
        $book->lang = $request->lang;
        $book->type = $request->productType;
       
        $book->is_ebook = $request->isEbook;
        $book->format = $request->format;
        $book->dimension = $request->dimension;
        $book->publication_date = $request->publication_date;
        $book->total_pages = $request->totalPages;
        $book->is_featured = $request->isFeatured ?? false;

        

        if ($request->thumbnail) {

            $book->thumbnail = $thumbnail['url'];
            $book->thumbnail_path = $thumbnail['name'];
        }



        $book->dummy_pdf = $request->hasFile('dummyPdf') ?  $dummyFile : null;
        if ($request->hasFile('book')) {
            $book->book_pdf = $bookFile;
        }
      
        if ($request->user_id != null) {
            $book->user_id = $request->author;
        }
        $book->save();
        notify()->success('Book Successfully inserted');
        return back();
    }


    public function changeFeatured($id)
    {
        $book = Book::find($id);

        if ($book->is_featured == 1) {
            $book->is_featured = 0;
        } else {
            $book->is_featured = 1;
        }
        $book->save();
        notify()->success("Featued Book Added ⭐");
        return back();
    }
}
