<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthViewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertViewIs('welcome')
                    ->assertStatus(200);
    }

    /**
     * @test
     * 
     */
    public function loginForm(){
        $response = $this->get('/login');
        $response
                ->assertStatus(200);
    }
}
