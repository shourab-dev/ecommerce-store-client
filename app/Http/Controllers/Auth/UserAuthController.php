<?php

namespace App\Http\Controllers\Auth;

use App\Models\Book;
use App\Models\Customer;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\CustomerAddress;
use App\Http\Helpers\MediaUploader;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserAuthController extends Controller
{
    use MediaUploader;

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

        $newBooks = $query->select('id', 'title', 'slug', 'class_room_id', 'thumbnail')->classroomName()->latest()->take(10)->get();


        return view('user.dashboard', compact('newBooks'));
    }


    function myProfile()
    {

        return view('user.profile');
    }

    function updateProfileData(Request $req)
    {
        $req->validate([
            'name' => "required",
            'email' => "required|email",
            "phone" => "nullable|min:11|max:11",
            "profile" => "nullable|mimes:png,jpg,webp",
        ]);



        $customer = Customer::where('id', auth()->guard('user')->user()->id)->first();
        $customer->name =  $req->name;
        $customer->email = $req->email;
        if ($req->hasFile("profile")) {
            //* REMOVE PREV FILE
            Storage::disk('public')->delete('/users/' . $customer->profile_path);
            //* UPLOAD FILE 
            $profile = $this->uploadSingleMedia($req->profile, 'users');
            $customer->profile_url = $profile['url'];
            $customer->profile_path = $profile['name'];
        }
        $customer->save();

        $customerAddress = CustomerAddress::updateOrCreate([
            'customer_id' => $customer->id
        ],[
            'phone' => $req->phone,
            'address' => $req->address,
        ]);
        return back();
    }

    function userRegister()
    {

        return view('auth.userRegister');
    }
    function userRegisterHandle(Request $req)
    {
        
        $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user =  Customer::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);
        
        Auth::guard('user')->login($user);
        return redirect()->route('user.dashboard');
    }
}
