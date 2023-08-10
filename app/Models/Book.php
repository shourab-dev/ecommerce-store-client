<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "country_id",
        "class_room_id",
        "subject_id",
        "title",
        "slug",
        "detail",
        "isPaid",
        "price",
        "selling_price",
        "lang",
        "thumbnail",
        "book_pdf",
        "is_featured",
        "dummy_pdf"
    ];

    //* GET GALLERY IMAGES
    public function gallery()
    {
        return $this->hasMany(GalleryImage::class)->select('id', 'book_id','gall_path')->latest();
    }

    //* GET AUTHOR 
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    //* GET AUTHOR NAME & ID ONLY
    public function scopeGetAuthorName($query)
    {
        return $query->with(['author' => function ($q) {
            $q->select('id', 'name');
        }]);
    }

    //* GET SUBJECT
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    //* GET SUBJECT NAME
    public function scopeSubjectName($query)
    {
        return $query->with(['subject' => function ($q) {
            $q->select('id', 'name', 'slug');
        }]);
    }
    //* GET Class
    public function class()
    {
        return $this->belongsTo(ClassRoom::class, 'class_room_id');
    }
    //* GET Class NAME
    public function scopeClassroomName($query)
    {
        return $query->with(['class' => function ($q) {
            $q->select('id', 'name', 'slug');
        }]);
    }

    //* BOOK HAS BEEN ADDED IN CART
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }


    public function scopeGetCartRegularPrice($query, $authId)
    {
        // return $query->whereHas('carts', function ($query) use ($authId) {
        //     $query->where('customer_id', $authId);
        // })->select('selling_price', 'price')->where('price', '!=', null)->where('selling_price', null)->sum('price');
        return DB::table('books')
            ->join('carts', 'books.id', '=', 'carts.book_id')
            ->select(DB::raw('sum(books.price*carts.amount) AS regulars'))
            ->where('carts.customer_id', $authId)
            ->where('books.price', '!=', null)
            ->where('books.selling_price', null)
            ->first()->regulars;
    }
    public function scopeGetCartDiscountPrice($query, $authId)
    {
        // return  $query->whereHas('carts', function ($query) use ($authId) {
        //     $query->where('customer_id', $authId);
        // })->select('selling_price', 'price')->where('selling_price', '!=', null)->sum('selling_price');

        return DB::table('books')
            ->join('carts', 'books.id', '=', 'carts.book_id')
            ->select(DB::raw('sum(books.selling_price*carts.amount) AS discounts'))
            ->where('carts.customer_id', $authId)
            ->where('books.selling_price', '!=', null)
            ->first()->discounts;
    }
    public function scopeGetCartSubTotal($query, $authId)
    {
        $regular = DB::table('books')
            ->join('carts', 'books.id', '=', 'carts.book_id')
            ->select(DB::raw('sum(books.price*carts.amount) AS regulars'))
            ->where('carts.customer_id', $authId)
            ->where('books.price', '!=', null)
            ->where('books.selling_price', null)
            ->first()->regulars;

        $discount =
            DB::table('books')
            ->join('carts', 'books.id', '=', 'carts.book_id')
            ->select(DB::raw('sum(books.selling_price*carts.amount) AS discounts'))
            ->where('carts.customer_id', $authId)
            ->where('books.selling_price', '!=', null)
            ->first()->discounts;
        return $regular + $discount;
    }

    //* GET SORTED PRODUCT
    public function scopeOrderByType($query, $type)
    {
        if ($type == 'popularity') {


            return  $query->where('is_featured', true);
        } elseif ($type == 'price') {

            return $query->orderBy('price', "asc");
        } elseif ($type == 'price-desc') {


            return $query->orderBy('price', 'desc');
        } else {

            return $query;
        }
    }


    //* GET FILTERED PRODUCTS
    public function scopeFilterBooks($query, $req)
    {
        if ($req->category) {
            $query->whereIn('class_room_id', $req->category);
        }
        if ($req->products) {
            $query->whereIn('subject_id', $req->products);
        }
        if ($req->authors) {
            $query->whereIn('user_id', $req->authors);
        }
        return $query;
    }
}
