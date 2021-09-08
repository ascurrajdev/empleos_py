<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;

class PostsUserPostulacionesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function get_a_redirect_to_postular_with_post_without_authenticated()
    {
        $response = $this->post('/publicaciones/1/postular');
        $response->assertStatus(302)
                ->assertSessionMissing("postulacionSuccess");
    }

    /**
     * @test
     */
    public function get_a_error_404_post_not_found(){
        $user = User::factory()->make();
        $response = $this->actingAs($user)
                        ->post('/publicaciones/1/postular');
        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function get_a_post_with_postulacion_success(){
        $user = User::factory()->create();
        $post = Post::factory()->create();
        $response = $this->actingAs($user)
                        ->post('/publicaciones/1/postular');
        $response->assertStatus(302)
                    ->assertSessionHas("postulacionSuccess");
    }

    /**
     * @test
     */
    public function get_redirect_when_try_obtain_all_postulaciones_without_authenticate(){
        $response = $this->get('/cuenta/postulaciones');
        $response->assertRedirect();
    }

    /**
     * @test
     */
    public function get_success_obtain_all_post_with_postulacion_of_my_user(){
        $user = User::factory()->make();
        $response = $this->actingAs($user)
                        ->get('/cuenta/postulaciones');
        $response->assertSuccessful();
    }
}
