<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'publisher' => fake()->company(),
            'edition' => fake()->randomDigit(),
            'publish_year' => fake()->year(),
            'price' => fake()->randomFloat(1, 20, 30),
        ];
    }
}
