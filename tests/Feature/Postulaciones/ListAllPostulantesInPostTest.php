<?php

namespace Tests\Feature\Postulaciones;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Post;
use App\Models\Postulacion;
use Tests\TestCase;

class ListAllPostulantesInPost extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function list_all_postulantes_in_post_of_a_user()
    {
        $user = User::factory()
                    ->has(Post::factory()->count(1),'publicaciones')    
                    ->create();
        $postulante = User::factory()->create();
        Postulacion::factory()
                    ->for($user->publicaciones[0]) 
                    ->for($postulante)
                    ->create();
        $this->actingAs($user);
        $this->get(route("posts.postulaciones.index",["post" => $user->publicaciones[0]]))
            ->assertStatus(200)
            ->assertSee($postulante->name);
    }

    /**
     * @test
     */
    public function cannot_view_list_other_user_without_access(){
        $user = User::factory()
                    ->has(Post::factory()->count(1),'publicaciones')    
                    ->create();
        $postulante = User::factory()->create();
        Postulacion::factory()
                    ->for($user->publicaciones[0]) 
                    ->for($postulante)
                    ->create();
        $this->actingAs($postulante);
        $this->get(route("posts.postulaciones.index",["post" => $user->publicaciones[0]]))
            ->assertStatus(403);
    }
}
