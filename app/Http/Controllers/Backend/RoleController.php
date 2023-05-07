<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function allRoles()
    {
        $roles = Role::latest()->get();
        return view('backend.roles.allRoles',compact('roles'));
    }


    public function storeRole(Request $request)
    {
        $request->validate([
            'name'=> 'required'
        ]);
        
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        return back()->with('success','Role created successfully');
        
    }


    public function editRole($id)
    {

        $role = Role::with('permissions')->where('id',$id)->first();
        return view('backend.roles.editRole',compact('role'));
        
    }

}
