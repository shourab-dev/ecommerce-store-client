<?php

namespace App\Http\Helpers;


trait SlugGenerator
{
    public function getSlug($req, $class)
    {
        $slug = str()->slug($req->name);
        $count = 0;
        if ($class::where('slug', 'LIKE', '%' . $slug . '%')->count() > 0) {
            $count += 1;
            $slug = $slug . '-' . $count;
        } else {
            $slug = $slug;
        }
        return $slug;
    }
}
