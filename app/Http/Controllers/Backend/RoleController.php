<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Svg\Tag\Rect;

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
        $authors = User::whereHas("roles", function ($q) {
            $q->where("name", "author");
        })->select('id', 'name')->where('name', 'LIKE', '%' . $req->name . '%')->get();
        return response()->json($authors);
    }



    /**
     * * GET ALL USERS
     */

    public function getAllUsers($id = null)
    {
        if ($id) {
            $editedUser = User::findOrFail($id);
        } else {
            $editedUser = null;
        }
        $roles = Role::where('name', "!=", "admin")->get();
        $users = User::whereHas('roles', function ($q) {
            $q->where('name', "!=", 'admin');
        })->latest()->paginate(10);

        return view('backend.roles.addUser', compact('roles', 'users', 'editedUser'));
    }


    /**
     * * UPDATE USER
     */
    function updateUser(Request $req, $id)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => "confirmed",
            'password_confirmation' => "required_with:password"
        ], [
            'password_confirmation.required_with' => "Please Confirm your password"
        ]);


        $user = User::findOrFail($id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;

        if($req->password){

            $user->password = Hash::make($req->password);
        }
        $user->save();

       $user->assignRole($req->role);
        notify()->success('User Updated');
        return redirect()->route('role.user.all');


    }
}
