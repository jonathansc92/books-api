<?php

namespace Tests\Feature;

use Tests\TestCase;

class BookViewTest extends TestCase
{
    public function test_report(): void
    {
        $response = $this->post('/api/report');

        $response->assertStatus(200);
    }
}
