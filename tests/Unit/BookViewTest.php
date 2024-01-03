<?php

namespace Tests\Feature;

use Tests\TestCase;

class BookViewTest extends TestCase
{
    public function test_index(): void
    {
        $response = $this->get('/api/reports/books');

        $response->assertStatus(200);
    }

    public function test_report(): void
    {
        $response = $this->post('/api/reports/books/export');

        $response->assertStatus(200);
    }
}
