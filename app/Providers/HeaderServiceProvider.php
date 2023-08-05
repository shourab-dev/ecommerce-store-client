<?php

namespace App\Providers;

use App\Models\HeaderSeeting;
use App\Models\SocialLink;
use Illuminate\Support\ServiceProvider;

class HeaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
        return view()->composer('layouts.frontendLayouts', function ($view) {
            $view->with('headerSetting', HeaderSeeting::first())->with('socials', SocialLink::select("name", 'link', 'icon')->where('link', "!=", null)->get());
        });
    
    }
}
