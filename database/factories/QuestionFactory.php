<?php

namespace Database\Factories;

use App\Models\ClassRoom;
use App\Models\Country;
use App\Models\QuestionType;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'class_room_id' => $this->faker->numberBetween(1, ClassRoom::count()),
            'subject_id' => $this->faker->numberBetween(1, Subject::count()),
            'question_name' => $this->faker->word(3),
            'slug' => str()->slug($this->faker->unique()->word(3)),
            'question' => $this->faker->paragraph(3),
            'date' => $this->faker->dateTimeBetween()
        ];
    }
}
