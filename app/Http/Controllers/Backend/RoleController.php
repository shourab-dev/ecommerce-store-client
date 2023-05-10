<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function allRoles()
    {
        $roles = Role::latest()->get();
        return view('backend.roles.allRoles', compact('roles'));
    }


    public function storeRole(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

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
}
