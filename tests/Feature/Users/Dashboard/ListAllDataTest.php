<?php

namespace Tests\Feature\Users\Dashboard;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListAllDataTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function can_view_dashboard_user_authenticated()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->get('/home')
            ->assertStatus(200)
            ->assertViewIs('home');
    }

    /**
     * @test
     */
    public function cannot_view_dashboard_user_guest(){
        $this->get('/home')
            ->assertRedirect('/login');
    }
}
