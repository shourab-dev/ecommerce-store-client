<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use App\Models\Subject;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function addSubject()
    {
        $countries = Country::latest()->get();
        $subjects = Subject::latest()->get();
        return view('backend.subject.addSubject', compact('countries', 'subjects'));
    }
}
