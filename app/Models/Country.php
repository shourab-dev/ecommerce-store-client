<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code'
    ];



    public function scopeGetAllCountry($query)
    {
        return $query->orderBy('name', 'ASC')->get();
    }


    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
