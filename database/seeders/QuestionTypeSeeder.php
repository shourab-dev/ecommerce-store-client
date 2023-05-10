<?php

namespace Database\Seeders;

use App\Models\QuestionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questionTypes = [
            'Multiple Choice',
            'Board Questions',
            'Job Questions',
            'Viva Questions',
        ];
        foreach ($questionTypes as $questionType) {
            QuestionType::create([
                'type' => $questionType,
                'slug' => str()->slug($questionType)
            ]);
        }
    }
}
