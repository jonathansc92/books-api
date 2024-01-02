<?php

namespace Tests\Feature;

use App\Models\Author;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    private $url = '/api/authors/';

    public function test_index(): void
    {
        $response = $this->get('/api/authors');

        $response->assertStatus(200);
    }

    public function test_store(): void
    {
        $data = Author::factory()->make()->toArray();

        $response = $this->post($this->url, $data);

        $response->assertStatus(201);
    }

    public function test_show(): void
    {
        $author = Author::factory()->create();
        $response = $this->get($this->url.$author->id);
        $response->assertStatus(200);
    }

    public function test_update(): void
    {
        $author = Author::factory()->create();

        $response = $this->put($this->url.$author->id, Author::factory()->make()->toArray());
        $response->assertStatus(200);
    }

    public function test_destroy(): void
    {
        $author = Author::factory()->create();

        $response = $this->delete($this->url.$author->id);
        $response->assertStatus(200);
    }
}
