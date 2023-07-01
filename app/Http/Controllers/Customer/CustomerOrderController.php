<?php

namespace App\Http\Controllers\Customer;

use App\Models\Book;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class CustomerOrderController extends Controller
{
    /**
     * * GET ALL CUSTOMER ORDERED E-BOOKS / PHYSICAL BOOKS
     */
    function getMyBooks()
    {

        $user = Customer::where('id', auth()->guard('user')->user()->id)->select('id')->with('orderedBooks')->first();
        $orderItemsIds = $user->orderedBooks->pluck('book_id');
        $query = Book::query();
        if (request()->routeIs('user.myorder.ebook')) {
            $query->whereIn('id', $orderItemsIds);
        } else {
            $query->whereIn('id', $orderItemsIds)->where('is_ebook', false);
        }
        $orderBooks = $query->select('id', 'user_id', 'class_room_id', 'subject_id', "title", "slug", "thumbnail", 'is_ebook')->classRoomName()->subjectName()->get();
        return view('user.myOrders', compact('orderBooks'));
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
        Mail::to("test@gmail.com")->queue(new InvoiceEmail());
    }
}
