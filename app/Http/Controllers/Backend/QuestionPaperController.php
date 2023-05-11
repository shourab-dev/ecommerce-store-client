<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Question;
use App\Models\QuestionType;
use Illuminate\Http\Request;

class QuestionPaperController extends Controller
{
    /**
     * * @RES ALL QUESTIONS
     */
    public function getAllQuestions($questions =  null)
    {
        if ($questions == null) {
            $questions = Question::withCount('pdfs as hasPdf')->with('types')->paginate(10);
        }

        $countries = Country::get();
        $types = QuestionType::get();

        return view('backend.questions.allQuestions', compact('questions', 'countries', 'types'));
    }

    /**
     * * @RES FILTERED QUESTIONS
     */
    public function filterQuestions(Request $req)
    {
        $questions = Question::withCount('pdfs as hasPdf')->filterQuestions(req: $req)->paginate(10);
        return $this->getAllQuestions($questions);
    }


    /**
     * *@RES CREATE VIEW 
     */

    public function createQuestions()
    {
        return view('backend.questions.addQuestions');
    }
}
