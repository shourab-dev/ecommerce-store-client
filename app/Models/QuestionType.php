<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type'
    ];


    public function questions()
    {
        return $this->belongsToMany(Question::class, 'question_types_questions', 'question_type_id', 'question_id');
    }
}
