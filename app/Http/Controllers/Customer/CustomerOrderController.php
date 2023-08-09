<?php

namespace App\Http\Controllers\Customer;


use Dompdf\Dompdf;
use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderItem;
use App\Mail\InvoiceEmail;
use Illuminate\Http\Request;
use App\Models\HeaderSeeting;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class CustomerOrderController extends Controller
{
    /**
     * * GET ALL CUSTOMER ORDERED E-BOOKS / PHYSICAL BOOKS
     */
    function getMyBooks()
    {

        $user = Customer::where('id', auth()->guard('user')->user()->id)->select('id')->whereHas('orders', function ($q) {
            $q->where('status', "Complete")->orWhere('status', "Delivered");
        })->with('orderedBooks')->first();
        if ($user != null) {
            $orderItemsIds = $user->orderedBooks->pluck('book_id');
        } else {
            $orderItemsIds = [];
        }
        $query = Book::query();
        if (request()->routeIs('user.myorder.ebook')) {
            $query->whereIn('id', $orderItemsIds)->where('type', 0)->where('is_ebook', true);
        }
        $orderBooks = $query->select('id', 'user_id', 'class_room_id', 'subject_id', "title", "slug", "thumbnail", 'is_ebook')->classRoomName()->subjectName()->get();

        return view('user.myOrders', compact('orderBooks'));
    }


    /**
     * * GET ALL ORDERS 
     */
    function getMyOrders()
    {
        $orders = Order::where('customer_id', auth()->guard('user')->user()->id)
            ->where('status', 'Complete')
            ->orWhere('status', 'delivered')
            ->latest()->with('orderItems')->paginate(10);
        return view('user.orderDelivered', compact('orders'));
    }

    /**
     * * GET CUSTOMER ORDER E-BOOK VIEW
     */
    public function viewMyBook($id)
    {
        return view('user.viewPdf', compact('id'));
    }

    public function getBookPdf($id)
    {


        if (Storage::exists('books')) {
            $book = Book::select('id', 'book_pdf')->find($id);

            $pdfPath = storage_path("app/books/$book->book_pdf");

            return response()->file($pdfPath,  [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline;'
            ]);
        }
    }


    /**
     * * SEND INVOICE ON ORDER
     */

    public function sendOrderInvoice($orderId)
    {
        $order = Order::with('orderItems')->find($orderId);
        // IF CONTAINS EBOOK
        $hasBookOnCart = OrderItem::where('order_id', $orderId)->whereHas('book', function ($q) {
            $q->where("type", 0)->where(
                'is_ebook',
                false
            )->orWhere('is_ebook', null);
        })->count();
        $deliveryFee = $hasBookOnCart > 0 ? HeaderSeeting::select('delivery_fee')->first()->delivery_fee : 0;
        $data = ["order" => $order, "deliveryFee" => $deliveryFee];


        $pdf = Pdf::loadView('emails.downloadInvoice', $data);
        return $pdf->download('Order-Invoice-' . today()->format("d-m-y") . '.pdf');
    }
}
