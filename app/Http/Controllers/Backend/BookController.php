<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{

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

        
    }
}
