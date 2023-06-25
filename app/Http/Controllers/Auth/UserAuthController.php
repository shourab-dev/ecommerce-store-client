<?php

namespace App\Http\Controllers\Auth;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\CustomerAddress;
use App\Http\Helpers\MediaUploader;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        return view('user.dashboard');
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
            "profile"=> "nullable|mimes:png,jpg,webp",
        ]);
        
        

        $customer = Customer::where('id', auth()->guard('user')->user()->id)->first();
        $customer->name =  $req->name;
        $customer->email = $req->email;
        if ($req->hasFile("profile")) {
            //* REMOVE PREV FILE
            Storage::disk('public')->delete('/users/'. $customer->profile_path);
            //* UPLOAD FILE 
            $profile = $this->uploadSingleMedia($req->profile, 'users');
            $customer->profile_url = $profile['url'];
            $customer->profile_path = $profile['name'];
        }
        $customer->save();

        $customerAddress = CustomerAddress::where('customer_id', $customer->id)->update([
            'phone' => $req->phone,
            'address' => $req->address,
        ]);
        return back();
    }
}
