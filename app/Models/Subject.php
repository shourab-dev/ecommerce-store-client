<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
      
        'name',
        'slug'
    ];




    public function classRooms()
    {
        return $this->belongsToMany(ClassRoom::class, 'class_rooms_subjects', 'subject_id', 'class_room_id');
    }
}
