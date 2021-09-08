<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;
use Hash;

class PostsUserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function obtenerVistaMisPublicacionesSinAutorizacion(){
        $response = $this->get('/cuenta/publicaciones');
        $response->assertStatus(302);
    }

    /**
     * @test
     */
    public function obtenerVistaMisPublicacionesConAutorizacion(){
        $user = User::factory()->make([
            'name' => 'Jose Ascurra',
            'email' => 'joseascurra123@gmail.com',
            'password' => Hash::make(strval(rand())),
            'role_id' => 1
        ]);
        $response = $this->actingAs($user)
                        ->get('/cuenta/publicaciones');
        $response->assertStatus(200)
                ->assertViewIs('publicaciones.cuenta.index');
    }

}
