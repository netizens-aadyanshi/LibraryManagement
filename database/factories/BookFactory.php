<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;

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
    protected $model = \App\Models\Book::class;
    public function definition(): array
    {
        return [
            //
            'author_id' => Author::inRandomOrder()->first()->id,
            'title' => $this->faker->sentence(3),
            'published_year' => $this->faker->year,
            'total_copies' => $this->faker->numberBetween(1,10),
            'available_copies' => $this->faker->numberBetween(0,10),
        ];
    }
}
