<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable  = [
        "customer_id",
        "book_id",
        "price",
    ];


    public function scopeGetTotalQuantity($query, $customerId)
    {
        $query->where('customer_id', $customerId);
    }

    

}
