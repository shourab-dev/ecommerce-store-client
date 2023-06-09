<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function getBooksByAuthor($id)
    {
        return $id. 'Hellow There';
    }
}
