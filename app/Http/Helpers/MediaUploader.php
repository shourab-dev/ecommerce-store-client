<?php

namespace App\Http\Helpers;

use Carbon\Carbon;

trait MediaUploader
{

    public function uploadSingleMedia($media, $path = 'books', $storage = 'public')
    {
        $name = str($media->getClientOriginalName() . '-' . Carbon::today()->format("d-m-y"))->slug() . '.' . $media->getClientOriginalExtension();
        $media->storeAs($path, $name, $storage);
        return $name;
    }
}
