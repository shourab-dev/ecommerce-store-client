<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;



    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function types()
    {
        return $this->belongsToMany(QuestionType::class, 'question_types_questions',  'question_id', 'question_type_id');
    }

    public function pdfs()
    {
        return $this->hasMany(PdfQuestion::class);
    }



    public function scopeFilterQuestions($query, $req)
    {
        //* REQ HAS COUNTRY
        if ($req->has('country')) {
            $query->with('classRoom')->whereHas(
                'classRoom',
                function ($q) use ($req) {
                    $q->where('country_id', $req->country);
                }
            );
        }
        //* REQ HAS ClassRoom
        if ($req->classRoom != null) {
            $query->with('classRoom')->whereHas(
                'classRoom',
                function ($q) use ($req) {
                    $q->where('id', $req->classRoom);
                }
            );
        }
        //* REQ HAS Subject
        if ($req->subject != null) {
            $query->with('subject')->whereHas(
                'subject',
                function ($q) use ($req) {
                    $q->where('id', $req->subject);
                }
            );
        }

        //* REQ HAS TYPE
        if ($req->has('type')) {

            $query->with('types')->whereHas(
                'types',
                function ($q) use ($req) {
                    $q->where('question_type_id', $req->type);
                }
            );
        }


        //* REQ HAS FROM DATE
        if ($req->from != null && $req->to == null) {
            $query->whereBetween('date', [$req->from, Carbon::today()]);
        }
        //* REQ HAS TO DATE
        if ($req->to != null && $req->form == null) {
            $query->where('date', '<=', $req->to);
        }
        //* REQ HAS BOTH DATES
        if ($req->from != null && $req->to != null) {
            $query->whereBetween('date', [$req->from, $req->to]);
        }
    }
}
