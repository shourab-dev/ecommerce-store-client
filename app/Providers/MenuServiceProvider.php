<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Subject;
use App\Models\ClassRoom;
use Illuminate\Support\Facades\Auth;
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
        $this->getClassRoomsAndSubjects();
        $this->getCartTotalCount();
    }

    //* GET ALL CLASSES AND SUBJECTS IN MENU
    private function getClassRoomsAndSubjects()
    {
        return
            view()->composer('layouts.frontendLayouts', function ($view) {
                $view->with('classRooms', ClassRoom::select('slug', 'name')->get())->with('subjects', Subject::select('slug', 'name')->get());
            });
    }


    //* GET TOTAL CART COUNT IN MENU
    private function getCartTotalCount()
    {

        return view()->composer('layouts.frontendLayouts', function ($view) {
            $view->with('cartTotalCount', Cart::getTotalQuantity(auth()->guard('user')->user()->id ?? 0)->count());
        });
    }
}
