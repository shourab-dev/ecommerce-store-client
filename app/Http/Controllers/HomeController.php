<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::count();
        $todaysOrder = Order::whereDate('created_at', today())->count();

        $monthlyOrder = Order::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();
        $unPaid = Order::getUnpaid()->count();
        $todaysUnPaid = Order::whereDate('created_at', today())->getUnpaid()->count();

        $totalRevenue = Order::getPaid()->sum('amount');
        $totalDue = Order::getUnpaid()->sum('amount');
        $todaysSell  = Order::whereDate('created_at', today())->getPaid()->sum('amount');
        $deliveryDue = Order::where('status', '!=', 'delivered')->getPaid()->count();
        
        return view('home', compact('orders', 'todaysOrder', 'monthlyOrder', 'unPaid', 'totalRevenue', 'totalDue', 'todaysSell', 'todaysUnPaid',  'deliveryDue'));
    }
}
