<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            [
                'name' => 'paint',
                'slug' => str('paint')->slug(),
            ],
            [
                'name' => 'papers',
                'slug' => str('papers')->slug(),
            ],
            [
                'name' => 'pen',
                'slug' => str('pen')->slug(),
            ],
        ];

        foreach ($subjects as $subject) {
            $subject = Subject::create($subject);
            $subject->classRooms()->attach([1, 2, 3]);
        }
    }
}
