<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'shourab',
            'email' => 'shourab.cit.bd@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);


        $user->assignRole('admin');


        $user2 = User::create([
            'name' => 'debashis',
            'email' => 'debashis@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);

        $user2->assignRole('admin');

        $user2 = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);

        $user2->assignRole('author');
    }
}
