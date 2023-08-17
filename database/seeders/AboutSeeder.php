<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'featured' => 'https://i0.wp.com/theperfectroundgolf.com/wp-content/uploads/2022/04/placeholder-6.png',
            'title' => "Welcome to Tallymart",
            'detail' => "Hellow",
        ]);
    }
}
