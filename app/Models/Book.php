<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $query->whereHas('carts', function ($query) use ($authId) {
            $query->where('customer_id', $authId);
        })->select('selling_price', 'price')->where('price', '!=', null)->where('selling_price', null)->sum('price');
    }
    public function scopeGetCartDiscountPrice($query, $authId)
    {
        return $query->whereHas('carts', function ($query) use ($authId) {
            $query->where('customer_id', $authId);
        })->select('selling_price', 'price')->where('selling_price', '!=', null)->sum('selling_price');
    }
    public function scopeGetCartSubTotal($query, $authId)
    {
        return $this->getCartDiscountPrice($authId) + $this->getCartRegularPrice($authId);
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
}
