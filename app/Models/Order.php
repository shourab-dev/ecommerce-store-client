<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        "name",
        "email",
        "phone",
        "amount",
        "status",
        "address",
        "transaction_id",
        "currency",
        "post_code"
    ];



    //* GET ORDER ITEMS
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    function scopeGetUnpaid($query)
    {
        return $query->where('status', 'Pending')->orWhere('status', 'Processing');
    }

    function scopeGetPaid($query)
    {
        return $query->where('status', 'Complete')->OrWhere('status', 'delivered');
    }
}
