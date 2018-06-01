<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserSignUpTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserCanSeeSignUpPage()
    {
        $e = $this->get('/register');
        $e->assertStatus(200);

        $e = $this->get('/notregister');
        $e->assertStatus(404);
    }

    public function testUserCanSignUp()
    {
        $this->withoutMiddleware();

        $response = $this->json(
            'POST',
            '/register',
            [
                'email' => 'daradosu@gmail.com',
                'password' => 'password365',
                'password_confirmation' => 'password365',
                'name' => 'tuvi',
            ]);

        $response->assertStatus(302);
    }
}
