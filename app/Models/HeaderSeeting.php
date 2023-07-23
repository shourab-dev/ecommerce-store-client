<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderSeeting extends Model
{
    use HasFactory;
    protected $fillable = [
        "logo",
        "phone",
        "email",
        "is_question",
        "footer_logo",
        "address"
    ];
}
