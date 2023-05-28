<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    private $validationRules = [
        'name' => 'required'
    ];


    public function allRoles()
    {
        $roles = Role::latest()->get();
        return view('backend.roles.allRoles', compact('roles'));
    }


    public function storeRole(Request $request)
    {
        $request->validate($this->validationRules);

        $role = new Role();
        $role->name = $request->name;
        $role->save();
        return back()->with('success', 'Role created successfully');
    }


    public function editRole($id)
    {

        $role = Role::with(['permissions' => function ($q) {
            $q->select('id');
        }])->where('id', $id)->first();
        $permissions = Permission::get()->groupBy('group');
        $allActivePermissions = collect($role['permissions'])->pluck('id')->toArray();

        return view('backend.roles.editRole', compact('role', 'permissions', 'allActivePermissions'));
    }


    public function updateRole(Request $req, $id)
    {
        $req->validate($this->validationRules);

        $role = Role::find($id);
        $role->name = $req->name;
        $role->save();
        $role->syncPermissions($req->permissions);
        return back();
    }



    /**
     * * GET ALL AUTHORS
     */

    public function getAuthors(Request $req)
    {
        $authors = User::whereHas("roles", function($q){ $q->where("name", "author"); })->select('id', 'name')->where('name', 'LIKE', '%' . $req->name . '%')->get();
        return response()->json($authors);
        
    }
}
