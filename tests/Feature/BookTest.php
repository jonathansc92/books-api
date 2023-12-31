<?php

namespace Tests\Feature;

use App\Models\Book;
use Tests\TestCase;

class BookTest extends TestCase
{
    private $url = '/api/books/';

    public function test_index(): void
    {
        $response = $this->get('/api/books');

        $response->assertStatus(200);
    }

    public function test_store(): void
    {
        $data = Book::factory()->make()->toArray();

        $response = $this->post($this->url, $data);

        $response->assertStatus(201);
    }

    public function test_show(): void
    {
        $book = Book::factory()->create();
        $response = $this->get($this->url.$book->id);
        $response->assertStatus(200);
    }

    public function test_update(): void
    {
        $book = Book::factory()->create();

        $response = $this->put($this->url.$book->id, Book::factory()->make()->toArray());
        $response->assertStatus(200);
    }

    public function test_destroy(): void
    {
        $book = Book::factory()->create();

        $response = $this->delete($this->url.$book->id);
        $response->assertStatus(200);
    }
}
