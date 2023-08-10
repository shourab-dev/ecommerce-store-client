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
        
        if ($request->status == null) {
            $query->where('status', "!=", 'delivered');
            

        }
        


        if ($request->from) {
            $query->whereDate('created_at', ">=", $request->from)->whereDate("created_at", "<=", today());
        }

        if ($request->to != null && $request->form == null) {
            $query->whereDate('created_at', '<=', $request->to);
        }

        if ($request->from != null && $request->to != null) {
            $query->whereDate('created_at', ">=", $request->from)->whereDate("created_at", "<=", $request->to);
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

        $orders = $query->withSum('orderItems as totalItems', 'total_orders')->latest()->paginate(20);

        return view('backend.orders.order', compact('orders'));
    }

    function viewOrders($orderId)
    {
        $order = Order::with('orderItems')->latest()->find($orderId);

        return view('backend.orders.viewOrder', compact('order'));
    }


    /**
     * * MARK AN ORDER AS PAID
     */
    function markPaid($orderId)
    {
        Order::findOrFail($orderId)->update([
            'status' => 'Complete'
        ]);
        notify()->success('Order Marked as paid');
        return back();
    }
    /**
     * * MARK AN ORDER AS DELIVERED
     */
    function markDelivered($orderId)
    {
        Order::findOrFail($orderId)->update([
            'status' => 'delivered'
        ]);
        notify()->success('Order Marked as delivered');
        return back();
    }

    /**
     ** DELETE AN ORDER 
     */
    function deleteOrder($id) {
    
        Order::findOrFail($id)->delete();
        notify()->success("Order Deleted");
        return back();
    
    }
}
