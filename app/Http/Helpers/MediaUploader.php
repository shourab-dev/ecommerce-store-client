<?php

namespace App\Http\Helpers;

use Carbon\Carbon;

trait MediaUploader
{

    public function uploadSingleMedia($media, $path = 'books', $slug = null, $storage = 'public')
    {
        $name = str(($slug ?? $media->getClientOriginalName() . '-' . Carbon::today()->format("d-m-y-h-i")))->slug() . '.' . $media->getClientOriginalExtension();
        $media->storeAs($path, $name, $storage);
        return $name;
    }
}
