<?php

namespace App\Http\Controllers\Bakend;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function addCountry()
    {
        $countries = Country::orderBy('name', 'ASC')->get();
        return view('backend.country.allCountry', compact('countries'));
    }

    public function storeCountry(Request $req)
    {
        $req->validate([
            'name' => 'required|unique:countries,name',
            'code' => 'required|unique:countries,code',
        ]);
        $country = new Country();
        $country->name = $req->name;
        $country->code = $req->code;
        $country->save();
        return back();
    }
}
