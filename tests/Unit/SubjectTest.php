<?php

namespace Tests\Feature;

use App\Models\Subject;
use Tests\TestCase;

class SubjectTest extends TestCase
{
    private $url = '/api/subjects/';

    public function test_index(): void
    {
        $response = $this->get('/api/subjects');

        $response->assertStatus(200);
    }

    public function test_store(): void
    {
        $data = Subject::factory()->make()->toArray();

        $response = $this->post($this->url, $data);

        $response->assertStatus(201);
    }

    public function test_show(): void
    {
        $subject = Subject::factory()->create();
        $response = $this->get($this->url.$subject->id);
        $response->assertStatus(200);
    }

    public function test_update(): void
    {
        $subject = Subject::factory()->create();

        $response = $this->put($this->url.$subject->id, Subject::factory()->make()->toArray());
        $response->assertStatus(200);
    }

    public function test_destroy(): void
    {
        $subject = Subject::factory()->create();

        $response = $this->delete($this->url.$subject->id);
        $response->assertStatus(200);
    }
}
