<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allRoles = [
            [
                'name' => 'admin',
                'guard' => 'web'
            ],

            [
                'name' => 'author',
                'guard' => 'web'
            ],
            [
                'name' => 'user',
                'guard' => 'user',
            ],
        ];

        foreach ($allRoles as $role) {
            Role::create([
                'name' => $role['name'],
                'guard_name' => $role['guard']
            ]);
        }
    }
}
