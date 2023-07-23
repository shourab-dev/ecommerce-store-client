<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\HeaderSeeting;
use App\Http\Helpers\MediaUploader;
use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    use MediaUploader;
    function setting()
    {
        $header = HeaderSeeting::first();
        return view('backend.settings.setting', compact('header'));
    }

    function updateSetting(Request $request)
    {
        $header = HeaderSeeting::first();
        if ($request->hasFile('logo')) {
            if (Storage::disk('public')->exists($this->removeUrl($header->logo))) {
                Storage::disk('public')->delete($this->removeUrl($header->logo));
            }
            $logo = $this->uploadSingleMedia($request->logo, 'assets');
            $header->logo = $logo['url'];
        }
        if ($request->hasFile('footer_logo')) {
            if (Storage::disk('public')->exists($this->removeUrl($header->footer_logo))) {
                Storage::disk('public')->delete($this->removeUrl($header->footer_logo));
            }
            $footer_logo = $this->uploadSingleMedia($request->footer_logo, 'assets');
            $header->footer_logo = $footer_logo['url'];
        }
        if ($request->hasFile('favicon')) {
            if (Storage::disk('public')->exists($this->removeUrl($header->favicon))) {
                Storage::disk('public')->delete($this->removeUrl($header->favicon));
            }
            $favicon = $this->uploadSingleMedia($request->favicon, 'assets');
            $header->favicon = $favicon['url'];
        }
        if ($request->hasFile('apple_site_icon')) {
            if (Storage::disk('public')->exists($this->removeUrl($header->apple_icon))) {
                Storage::disk('public')->delete($this->removeUrl($header->apple_icon));
            }
            $apple_icon = $this->uploadSingleMedia($request->apple_site_icon, 'assets');
            $header->apple_icon = $apple_icon['url'];
        }

        $header->address = $request->address;
        $header->phone = $this->buildJson($request->phone);
        $header->email = $this->buildJson($request->email);
        $header->is_question = $request->is_question ?? false;
        $header->title = $request->title;
        $header->detail = $request->detail;
        $header->canonical = $request->canonical;
        $header->save();


        return back();
    }


    private function removeUrl($url)
    {
        return str($url)->replace(env('APP_URL') . '/storage/', '');
    }
    private function buildJson($data)
    {
        if ($data != null) {

            $dataArray = str($data)->explode(',');
            return json_encode($dataArray);
        }
        return null;
    }


    function getSocialMedia()
    {
        $socialMedias = SocialLink::get();
        return view('backend.settings.socialMedia', compact('socialMedias'));
    }
    function updateSocial(Request $request)
    {
        
        $socialArray =  $request->social;
        foreach ($socialArray as $key => $social) {
            SocialLink::find($key)->update([
                'link' => $social,
            ]);
        }
        return back();
    }
}
