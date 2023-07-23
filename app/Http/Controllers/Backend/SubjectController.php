<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use App\Models\Subject;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\SlugGenerator;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
{
    use SlugGenerator;
    public $validation = [
        'name' => 'required',
        
    ];
    public function addSubject()
    {
        $categories = ClassRoom::latest()->get();
        $subjects = Subject::latest()->get();
        return view('backend.subject.addSubject', compact('categories', 'subjects'));
    }

    function storeSubject(Request $req) {
        $data = $req->validate($this->validation);
        $slug = $this->getSlug($req, Subject::class);
        $data['slug'] = $slug;
        Subject::create($data);
        return back();
    }

    function editSubject(Subject $editedSubject) {
        $categories = ClassRoom::latest()->get();
        $subjects = Subject::latest()->get();
        
        return view('backend.subject.addSubject', compact('categories','subjects', 'editedSubject'));
    }


    function updateSubject(Request $req, Subject $subject) {
        $data  = $req->validate($this->validation);
        
        $data['slug'] = $this->getSlug($req, Subject::class);
        $subject->update($data);
        return back();
    }
}
