<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Country;
use App\Models\Subject;
use App\Models\Question;
use App\Models\ClassRoom;
use App\Models\PdfQuestion;
use App\Models\QuestionType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            $questions = Question::select('id', 'class_room_id', 'question_name', 'date')->withCount('pdfs as hasPdf')->with('types')->oldest()->paginate(10);
        }

        $countries = Country::get();
        $types = QuestionType::get();

        return view('backend.questions.allQuestions', compact('questions', 'countries', 'types'));
    }

    /**
     * * @RES ALL CLASSROOMS
     */
    public function getClasses(Request $req)
    {
        $classRooms = ClassRoom::where('country_id', $req->country)->select('id', 'name', 'country_id')->get();
        if (count($classRooms) > 0) {

            return response(json_encode($classRooms));
        } else {
            return response('No Class Found !', 404);
        }
    }
    public function getSubjects(Request $req)
    {
        $subjects = Subject::whereHas('classRooms', function ($q) use ($req) {
            $q->where('class_room_id', $req->class);
        })->select('id', 'name')->get();
        if (count($subjects) > 0) {

            return response(json_encode($subjects));
        } else {
            return response('No Subjects Found !', 404);
        }
    }





    /**
     * * @RES FILTERED QUESTIONS
     */
    public function filterQuestions(Request $req)
    {
        $questions = Question::select('id', 'class_room_id', 'question_name', 'date')->withCount('pdfs as hasPdf')->filterQuestions(req: $req)->oldest()->paginate(10);
        return $this->getAllQuestions($questions);
    }


    /**
     * *@RES CREATE VIEW 
     */

    public function createQuestions()
    {

        $countries = Country::get();
        $types = QuestionType::get();

        return view('backend.questions.addQuestions', compact('countries', 'types'));
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
        foreach ($pdfFiles as $pdf) {
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
            $pdf_name = uniqid() . '.' . $pdf->getClientOriginalExtension();
            $pdf->storeAs('pdf', $pdf_name, 'public');
            array_push($pdfFileNames, $pdf_name);
        }
        return $pdfFileNames;
    }
}
