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
    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    //* GET SUBJECT NAME
    public function scopeSubjectName($query)
    {
        return $query->with(['subject' => function ($q) {
            $q->select('id', 'name','slug');
        }]);
    }
    //* GET Class
    public function class(){
        return $this->belongsTo(ClassRoom::class, 'class_room_id');
    }
    //* GET Class NAME
    public function scopeClassroomName($query)
    {
        return $query->with(['class' => function ($q) {
            $q->select('id', 'name','slug');
        }]);
    }

}
