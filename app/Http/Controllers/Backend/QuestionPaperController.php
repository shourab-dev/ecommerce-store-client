<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\PdfQuestion;
use App\Models\Question;
use App\Models\QuestionType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuestionPaperController extends Controller
{

    private $validateOptions = [
        'country' => 'required',
        'name' => 'required',
        'type' => 'required',
    ];

    /**
     * * @RES ALL QUESTIONS
     */
    public function getAllQuestions($questions =  null)
    {
        if ($questions == null) {
            $questions = Question::select('id', 'country_id', 'question_name', 'date')->withCount('pdfs as hasPdf')->with('types')->paginate(10);
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
        $questions = Question::select('id', 'country_id', 'question_name', 'date')->withCount('pdfs as hasPdf')->filterQuestions(req: $req)->paginate(10);
        return $this->getAllQuestions($questions);
    }


    /**
     * *@RES CREATE VIEW 
     */

    public function createQuestions()
    {
        $countries = Country::get();
        $types = QuestionType::get();

        return view('backend.questions.addQuestions',compact('countries', 'types'));
    }


    /**
     * * @RES CREATE NEW QUESTION
     */

    public function storeQuestions(Request $req)
    {
        //* REQ VALIDATION
        // $req->validate($this->validateOptions);


        //* PDF FILE UPLOADs
        $pdfFiles = $this->uploadsPdf($req);
        
        //* REQ STORE
        $question = new Question();
        $question->question_name = $req->name;
        $question->slug = str()->slug($req->name);
        $question->country_id = $req->country;
        $question->question = $req->question;
        $question->date = $req->date ?? Carbon::today();
        $question->save();

        //* ATTACH TYPES
        $question->types()->attach($req->type);

        //* STORE PDF 
        foreach($pdfFiles as $pdf){
            $pdfQuestion = new PdfQuestion();
            $pdfQuestion->question_id = $question->id;
            $pdfQuestion->pdf = $pdf;
            $pdfQuestion->save();
        }
    }




    private function uploadsPdf($req)
    {
        $pdfFileNames = [];
        foreach ($req->pdfs as $pdf) {
            $pdf_name = uniqid() .'.'. $pdf->getClientOriginalExtension();
            $pdf->storeAs('pdf', $pdf_name, 'public');
            array_push($pdfFileNames, $pdf_name);
        }
        return $pdfFileNames;
    }
}
