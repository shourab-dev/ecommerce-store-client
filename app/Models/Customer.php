<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
    ];



    //* GET USER CART
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    //* GET USER Orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    //* GET USER Orders Items
    public function orderedBooks()
    {
        return $this->hasManyThrough(OrderItem::class, Order::class);
    }
}
