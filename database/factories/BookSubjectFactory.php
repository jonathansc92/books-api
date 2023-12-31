<?php

namespace Database\Factories;

use App\Models\BookSubject;
use App\Models\Book;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class BookSubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => fake()->randomElement(Book::pluck('id')),
            'subject_id' => fake()->randomElement(Subject::pluck('id')),
        ];
    }
}
