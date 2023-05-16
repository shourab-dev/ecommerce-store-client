<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\SlugGenerator;
use App\Models\ClassRoom;
use App\Models\Country;

use Illuminate\Http\Request;


class ClassRoomController extends Controller
{
    use SlugGenerator;

    public $validation = [
        'name' => 'required',
        'country_id' => "required"
    ];
    /**
     *  * @RETURN RES CLASSROOM FORM AND ALL CLASSROOM LIST
     */

    public function addClassRoom()
    {
        $countries = Country::latest()->get();
        $classRooms = ClassRoom::select('id', 'name')->get();
        return view('backend.classRoom.addClassRoom', compact('classRooms', 'countries'));
    }


    public function storeClassRoom(Request $req)
    {
        $data = $req->validate($this->validation);
        $slug = $this->getSlug($req, ClassRoom::class);
        $data['slug'] = $slug;
        ClassRoom::create($data);
        return back();
    }


    public function editClassRoom(ClassRoom $editedClassRoom)
    {
        $countries = Country::latest()->get();
        $classRooms = ClassRoom::select('id', 'name')->get();
        return view('backend.classRoom.addClassRoom', compact('classRooms', 'countries', 'editedClassRoom'));
    }



    public function updateClassRoom(Request $req, ClassRoom $classRoom)
    {
        $data  = $req->validate($this->validation);
        $data['slug'] = $this->getSlug($req, ClassRoom::class);
        $classRoom->update($data);
        return back();
    }





    
}
