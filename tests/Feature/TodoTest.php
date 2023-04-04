<?php

namespace Tests\Feature;

use App\Models\Todo;
use App\Models\User;
use Database\Factories\TodoFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class TodoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    protected function setUp(): void
    {
        parent::setUp();

    }

    public function test_todo_index(): void
    {

    }

}
