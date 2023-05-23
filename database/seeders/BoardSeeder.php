<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $boards = [
            'Chittagong',
            'Dhaka',
            'Cumilla',
            'Barisal',
            'Dinajpur',
            'Jessore',
            'Mymensingh',
            'Rajshahi',
            'Sylhet',
        ];
        foreach ($boards as $board) {

            Board::create([
                'name' => $board,
                'slug' => str()->slug($board),
            ]);
        }
    }
}
