<?php


namespace App\Http\Helpers;

use App\Models\Book;
use App\Models\OrderItem;


trait BestSellingBook
{

    public function getBestSellingBooks($limit = null)
    {
        $mostSellingBooks = OrderItem::getBestSellingBooksId($limit)->get();
        $bookIds = $mostSellingBooks->pluck('book_id')->toArray();
        $books = Book::query()->whereIn('id', $bookIds)->where('type', 0);
        return $books;
    }
}
