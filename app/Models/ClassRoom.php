<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'name',
        'slug'
    ];

    public function country()
    {
        return $this->hasMany(Country::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(ClassRoom::class, 'class_rooms_subjects',  'class_room_id', 'subject_id');
    }
}
