<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginPage extends TestCase
{
    use RefreshDatabase;
    public function test_login_page()
    {
       /* User::create([
            'email'=>'admin@gmail.com',
            'password'=>'11111111'
        ]);*/
        $response = $this->get('/login');
        $response->assertSee('Sign in to your account');
        $response->assertStatus(200);
    }
}
