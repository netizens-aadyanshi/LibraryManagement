<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\Member;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Borrow::class;

    public function definition(): array
    {

        $borrowed_at = $this->faker->dateTimeBetween('-2 months', 'now');
        $due_date = $this->faker->dateTimeBetween($borrowed_at, '+1 month');
        $returned_at = $this->faker->boolean(50) ? $this->faker->dateTimeBetween($borrowed_at, 'now') : null;

        return [
            //
            'book_id' => Book::inRandomOrder()->first()->id,
            'member_id' => Member::inRandomOrder()->first()->id,
            'borrowed_at' => $borrowed_at,
            'due_date' => $due_date,
            'returned_at' => $returned_at,

        ];
    }
}
