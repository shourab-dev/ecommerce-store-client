<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $classRooms = [
            [
                'country_id' => 1,
                'name' => "Romance",
                'slug' => "romance",
            ],
            [
                'country_id' => 1,
                'name' => "Horror",
                'slug' => "horror",
            ],
            [
                'country_id' => 1,
                'name' => "Novel",
                'slug' => "novel",
            ],
        ];

        foreach ($classRooms as $key => $classRoom) {
            ClassRoom::create($classRoom);
        }
    }
}
