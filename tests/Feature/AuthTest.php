<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    const PASSWORD = 'example123';
    public function testCanBeRegistered(): void
    {
        $credentials = [
            'username' => 'example',
            'name' => 'example',
            'email' => 'example@gmail.com',
            'password' => self::PASSWORD,
            'password_confirmation' => self::PASSWORD,
        ];
        $response = $this->postJson('api/account/register', $credentials);
        $response->assertJsonStructure(['token']);
        $response->assertStatus(200);
    }

    public function testCanBeLoggedIn(): void
    {
        $user = User::factory()->createOne(['username' => 'example',
            'name' => 'example',
            'email' => 'example@gmail.com',
            'password' => Hash::make(self::PASSWORD),]);
        $credentials = [
            'email' => $user->email,
            'password' => self::PASSWORD,
        ];
        $response = $this->postJson('api/account/login', $credentials);
        $response->assertJsonStructure(['token']);
        $response->assertStatus(200);
    }

    public function testCanNotBeLoggedInWithWrongEmail(): void
    {
        $invalidCredentials = [
            'email' => 'example1@gmail.com',
            'password' => self::PASSWORD,
        ];
        $response = $this->postJson('api/account/login',$invalidCredentials);
        $response->assertJsonStructure(['message']);
    }
}
