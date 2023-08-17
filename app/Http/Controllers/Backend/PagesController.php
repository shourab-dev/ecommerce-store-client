<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    function pages(Request $request, $type)
    {
        $pages = Pages::where('type', $type)->first();
        return view('backend.pages.allPages', compact('pages', 'type'));
    }
    function updatePages(Request $request, $type)
    {
        Pages::updateOrCreate([
            "type" => $type,
        ], [
            "type" => $type,
            "detail" => $request->detail,
        ]);
        notify()->success(str($type)->headline() . " has been updated");
        return back();
    }
}
