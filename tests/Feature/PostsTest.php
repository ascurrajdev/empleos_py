<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Hash;

class PostsTest extends TestCase
{
    /**
     * @test
     */
    public function redireccionLoginVistaCrearPublicacion()
    {
        $response = $this->get('publicaciones/create');
        $response->assertStatus(302);
    }

    /**
     * @test
     */
    public function obtenerVistaCrearPublicacion(){
        $user = User::factory()->make([
            'name' => 'Jose Ascurra',
            'email' => 'joseascurra123@gmail.com',
            'password' => Hash::make(strval(rand())),
            'role_id' => 1
        ]);
        $response = $this->actingAs($user)
                            ->get('publicaciones/create');
        $response->assertStatus(200)
                ->assertViewIs('publicaciones.create');
    }

    /**
     * @test
     */
    public function obtenerVistaPublicaciones(){
        $response = $this->get('publicaciones');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function obtenerUsuarioNoAutorizadoStorePublicacion(){
        $response = $this->json('POST','publicaciones',[
            'categoria_id' => 1,
            'titulo' => "Hola",
            'descripcion' => "Hola",
            'beneficio' => "Hola",
            'requisitos' => "Hola"
        ]);
        $response->assertStatus(401);
    }

}
