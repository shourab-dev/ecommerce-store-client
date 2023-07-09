<?php

namespace App\Http\Controllers\backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * * GET TODAYS ORDER
     */
    function getOrders(Request $request) {
        $query = Order::query();
        $orders = $query->withCount("orderItems as totalItems")->paginate(20);

        return view('backend.orders.order',compact('orders'));
    }

    function viewOrders ($orderId)  {
        $order = Order::with('orderItems')->find($orderId);
        
        return view('backend.orders.viewOrder', compact('order'));
    }
}
