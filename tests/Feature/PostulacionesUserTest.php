<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;
use Hash;

class PostulacionesUserTest extends TestCase
{
    /**
     * @test
     */
    public function obtenerVistaDePostulacionesEmpleosDelUsuarioSinAutorizacion()
    {
        $response = $this->get('cuenta/postulaciones');
        $response->assertStatus(302);
    }

    /**
     * @test
     */
    public function obtenerVistaPostulacionesEmpleosDelUsuario(){
        $user = User::factory()->make([
            'name' => 'Jose Ascurra',
            'email' => 'joseascurra123@gmail.com',
            'password' => Hash::make(strval(rand())),
            'role_id' => 1
        ]);
        $response = $this->actingAs($user)
                        ->get('cuenta/postulaciones');
        $response->assertStatus(200);
    }

}
