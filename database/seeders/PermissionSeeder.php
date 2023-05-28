<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role' => [
                'names' => [
                    'manage role',
                    'create role',
                    'edit role',
                    'delete role',
                ],
                'description' => 'Manage Role',
            ],
            'employee' => [
                'names' => [
                    'manage employee',
                    'create employee',
                    'edit employee',
                    'delete employee',
                ],
                'description' => 'Manage employee',
            ],
            'author' => [
                'names' => [
                    'manage books',
                    'create book',
                    'edit book',
                    'delete book',
                ],
                'description' => 'Manage Books',
            ],

        ];

        foreach ($permissions as $key => $permission) {
            foreach ($permission['names'] as $name) {
                Permission::create([
                    'name' => $name,
                    'group' => $key,
                    'details' => $permission['description'],
                ]);
            }
        }


        $admin = Role::where('name', 'admin')->first();

        $admin->syncPermissions(Permission::all());
    }
}
