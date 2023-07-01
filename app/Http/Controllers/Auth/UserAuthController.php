<?php

namespace App\Http\Controllers\Auth;

use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function userLogin()
    {
        return view('auth.userLogin');
    }

    public function handleUserLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }



    public function dashboard()
    {
        $myOrderBooks = OrderItem::select('id', 'book_id')->whereHas('order', function ($q) {
            $q->where('customer_id', auth()->guard('user')->user()->id);
        })->get()->pluck('book_id');

         $query = Book::query();
        //* IF ANY BOOKS HAS BEEN ORDERED
        if (count($myOrderBooks) > 0) {

            $books = Book::whereIn('id', $myOrderBooks)->select('id', 'class_room_id', 'subject_id')->get();
            $booksCategories = $books->pluck('class_room_id');
            $query->whereIn('class_room_id', $booksCategories);
        }

        $newBooks = $query->select('id', 'title', 'slug',  'thumbnail')->latest()->take(10)->get();
        

        return view('user.dashboard',compact('newBooks'));
    }
}
