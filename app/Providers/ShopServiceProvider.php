<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Subject;
use App\Models\ClassRoom;
use Illuminate\Support\ServiceProvider;

class ShopServiceProvider extends ServiceProvider
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
        return view()->composer('frontend.shop', function ($view) {

            $view->with('classRooms', ClassRoom::where('country_id', 1)->select('name', 'id')->get())
                ->with('subjects', Subject::select('name', 'id')->get())
                ->with('authors', User::whereHas("roles", function ($q) {
                    $q->where("name", "author");
                })->select('id', 'name')->get());
        });
    }
}
