<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $with = ['book'];

    //* GET BOOKS
    public function book()
    {
        return $this->belongsTo(Book::class)->select('id', 'title', 'slug', 'detail', 'lang', 'is_ebook','thumbnail', 'book_pdf','selling_price','price');
    }


    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    public function scopeGetBestSellingBooksId($query, $limit = 5)
    {
        $query->select('book_id')
            ->groupBy('book_id')
            ->orderByRaw('COUNT(*) DESC')
            ->withOut('book')
            ->limit($limit);
    }
}
