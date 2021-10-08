<?php

namespace Tests\Feature\Users\Publicaciones;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListAllMisPublicacionesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function list_all_publicaciones_of_user()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->get(route('users.posts.index'))
            ->assertSuccessful();
    }

    /**
     * @test
     */
    public function cannot_view_all_publicaciones_for_users_guest(){
        $this->get(route('users.posts.index'))
                ->assertRedirect('login');
    }
}
