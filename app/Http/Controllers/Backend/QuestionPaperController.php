<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionPaperController extends Controller
{
    public function getAllQuestions()
    {
        return view('backend.questions.allQuestions');
    }
}
