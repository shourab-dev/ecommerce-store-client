<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\HeaderSeeting;
use App\Http\Controllers\Controller;

class CustomerInvoiceController extends Controller
{
    public function getAllInvoices()
    {

        $orders = Order::withSum('orderItems as totalItems', 'total_orders')
            ->where('customer_id', auth()->guard('user')->user()->id)
            ->where('status', "Complete")
            ->orWhere('status', 'delivered')->latest()->paginate(20);
        $deliveryFee = HeaderSeeting::select('delivery_fee')->first()->delivery_fee;



        return view('user.invoices', compact('orders', 'deliveryFee'));
    }
}
