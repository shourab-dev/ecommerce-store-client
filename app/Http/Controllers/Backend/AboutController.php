<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaUploader;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    use MediaUploader;
    function about()
    {
        $about = About::first();
        return view('backend.about.about', compact('about'));
    }

    function updateAbout(Request $request)
    {

        $about = About::first();

        if ($request->hasFile('featured')) {
            if (Storage::disk('public')->exists($about->featured_path ?? "")) {
                Storage::disk('public')->delete($about->featured_path ?? "");
            }
            //* STORING FILES ON SERVER
            $aboutFeatured = $this->uploadSingleMedia($request->featured, 'assets', str($request->title)->slug());
        }
        $about->title = $request->title;
        if ($request->hasFile('featured')) {
            $about->featured = $aboutFeatured['url'];
            $about->featured_path = $aboutFeatured['name'];
        }
        $about->detail = $request->detail;
        $about->save();
        notify()->success('About Saved!');
        return back();
    }
}
