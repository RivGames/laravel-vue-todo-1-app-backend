<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppTest extends TestCase
{
    public function test_app_success_message()
    {
        $response = $this->get('api/status');

        $response->assertExactJson(['status' => 'OK', 'message' => 'Looks pretty good']);
        $response->assertStatus(200);
    }
}
