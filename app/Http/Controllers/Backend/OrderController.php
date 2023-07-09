<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * * GET TODAYS ORDER
     */
    function getOrders(Request $request)
    {




        $query = Order::query();



        if ($request->order_id) {
            $query->where('id', $request->order_id);
        }
        if ($request->transaction) {
            $query->where('transaction_id', $request->transaction);
        }
        if ($request->status) {
            $query->where('status', $request->status);
        }


        if ($request->from) {
            $query->whereBetween('created_at', [$request->from, Carbon::today()]);
        }

        if ($request->to != null && $request->form == null) {
            $query->where('created_at', '<=', $request->to);
        }

        if ($request->from != null && $request->to != null) {
            $query->whereBetween('created_at', [$request->from, $request->to]);
        }


        if ($request->type != null) {
            $orders = $query->whereHas('orderItems', function ($q) use ($request) {
                $q->whereHas("book", function ($q2) use ($request) {
                    $q2->where("is_ebook", $request->type);
                });
            })->withCount("orderItems as totalItems")->paginate(20);
            return view('backend.orders.order', compact('orders'));
            exit();
        }

        $orders = $query->withCount("orderItems as totalItems")->paginate(20);
        return view('backend.orders.order', compact('orders'));
    }

    function viewOrders($orderId)
    {
        $order = Order::with('orderItems')->find($orderId);

        return view('backend.orders.viewOrder', compact('order'));
    }
}
