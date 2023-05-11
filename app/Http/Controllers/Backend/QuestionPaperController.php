<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Question;
use App\Models\QuestionType;
use Illuminate\Http\Request;

class QuestionPaperController extends Controller
{
    public function getAllQuestions($questions =  null)
    {
        if ($questions == null) {
            $questions = Question::with('types')->paginate(10);
        }
        $countries = Country::get();
        $types = QuestionType::get();
        
        return view('backend.questions.allQuestions', compact('questions', 'countries', 'types'));
    }


    public function filterQuestions(Request $req)
    {
        $questions = Question::filterQuestions(req: $req)->paginate(10);
        return $this->getAllQuestions($questions);
    }
}
