<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable  = [
        'book_id',
        'gall_url',
        'gall_path',
    ];

    public function product()
    {
        return $this->belongsTo(Book::class);
    }
}
