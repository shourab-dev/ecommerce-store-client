<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\PdfQuestion;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuestionPaperController extends Controller
{
    /**
     * * GET ALL QUESTION PAPERS
     */
    public function getAllQuestions(Request $request)
    {


        $questions = Question::filterFrontendQuestions($request)->subjectName()->classRoomName()->select('id', 'class_room_id', 'subject_id', 'slug', 'question_name', 'date')->latest()->paginate(20);
        $classRooms = ClassRoom::select('id', 'name')->get();
        $subjects = Subject::select('id', 'name')->get();
        return view('frontend.questions', compact('questions', 'classRooms', 'subjects'));
    }

    /**
     * * GET A QUESTION PAPER
     */

    public function getAQuestion($slug)
    {
        $question = Question::where('slug', $slug)->with('pdfs:id,question_id')->subjectName()->classRoomName()->latest()->first();

        return view('frontend.singleQuestion', compact('question'));
    }

    public function viewQuestionPDF($id)
    {
        $questionPdf = PdfQuestion::findOrFail($id);
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . "Question" . '"'
        ];
        $path = public_path("storage/$questionPdf->pdf",$headers);
        // dd($path);
        return response()->file($path);
    }
}
