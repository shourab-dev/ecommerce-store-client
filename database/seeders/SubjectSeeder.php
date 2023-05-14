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
                'name' => 'English',
                'slug' => 'english'
            ],
            [
                'name' => 'Math',
                'slug' => 'math'
            ],
            [
                'name' => 'Ict',
                'slug' => 'ict'
            ],
        ];

        foreach ($subjects as $subject) {
            $subject = Subject::create($subject);
            $subject->classRooms()->attach([1, 2, 3]);
        }
    }
}
