<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthViewsTest extends TestCase
{
    /**
     * @test
     * 
     */
    public function loginForm(){
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function loginFormFacebook(){
        $response = $this->get('/login/facebook');
        $response->assertStatus(302);
    }

    /**
     * @test
     */
    public function registerForm(){
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

}
