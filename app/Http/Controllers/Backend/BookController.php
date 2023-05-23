<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{

    //* ADD BOOKS VIEW
    public function addBook()
    {
        return view('backend.books.addBooks');
    }
}
