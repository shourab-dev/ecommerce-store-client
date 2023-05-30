<?php

namespace App\Providers;

use App\Models\ClassRoom;
use App\Models\Subject;
use Illuminate\Support\ServiceProvider;


class MenuServiceProvider extends ServiceProvider
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
        view()->composer('layouts.frontendLayouts', function ($view) {
            $view->with('classRooms', ClassRoom::select('slug', 'name')->get())->with('subjects', Subject::select('slug','name')->get());
        });
    }
}
