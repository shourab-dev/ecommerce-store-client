<?php

namespace Database\Factories;

use App\Models\ClassRoom;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 3,
            'country_id' => 1,
            'class_room_id' => $this->faker->numberBetween(1, ClassRoom::count()),
            'subject_id' => $this->faker->numberBetween(1, Subject::count()),
            'title' => $this->faker->name(),
            'slug' => str($this->faker->name())->slug(),
            'detail' => $this->faker->paragraph(2),
            'isPaid' => 1,
            'price' => $this->faker->numberBetween(100, 500),
            'selling_price' => $this->faker->numberBetween(100, 300),
            'lang' => 'english',
            'thumbnail' => "http://127.0.0.1:8000/storage/thumbnails/funEmoji.svg",
            'book_pdf' => 'mainBook.pdf',
            'is_featured' => $this->faker->numberBetween(0, 1)

        ];
    }
}
