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
                'name' => "Class 1",
                'slug' => "Class-1",
            ],
            [
                'country_id' => 1,
                'name' => "Class 2",
                'slug' => "Class-2",
            ],
            [
                'country_id' => 1,
                'name' => "Class 3",
                'slug' => "Class-3",
            ],
        ];

        foreach ($classRooms as $key => $classRoom) {
            ClassRoom::create($classRoom);
        }
    }
}
