<?php

namespace App\Http\Controllers\Bakend;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function addCountry()
    {
        $countries = Country::getAllCountry();
        return view('backend.country.allCountry', compact('countries'));
    }

    public function storeCountry(Request $req)
    {
        $req->validate([
            'name' => 'required|unique:countries,name',
            'code' => 'required|unique:countries,code',
        ]);
        $country = new Country();
        $this->saveCountry($country, $req);
        return back();
    }


    public function editCountry(Country $editedCountry)
    {

        $countries = Country::getAllCountry();
        return view('backend.country.allCountry', compact('editedCountry', 'countries'));
    }


    public function updateCountry(Request $req,Country $country)
    {
        $req->validate([
            'name' => 'required',
            'code' => 'required',
        ]);
        $this->saveCountry($country, $req);

        return back();
    }


    private function saveCountry($country, $req)
    {
        $country->name = $req->name;
        $country->code = $req->code;
        $country->save();
    }
}
