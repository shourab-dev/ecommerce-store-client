<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\QuestionType;
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
            'country_id' => $this->faker->numberBetween(1, Country::count()),
            'question_type_id' => $this->faker->numberBetween(1, QuestionType::count()),
            'question_name' => $this->faker->paragraph(2),
            'question' => $this->faker->paragraph(3),
            'date' => $this->faker->dateTimeBetween()
        ];
    }
}
