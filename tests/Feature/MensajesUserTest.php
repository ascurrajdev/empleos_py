<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;
use Hash;

class MensajesUserTest extends TestCase
{
    /**
     * @test
     */
    public function obtenerVistaMensajesUsuariosSinAutorizacion(){
        $response = $this->get('/cuenta/mensajes');
        $response->assertStatus(302);
    }

    /**
     * @test
     */
    public function obtenerVistaMensajesUsuariosConAutorizacion(){
        $user = User::factory()->make([
            'name' => 'Jose Ascurra',
            'email' => 'joseascurra123@gmail.com',
            'password' => Hash::make(strval(rand())),
            'role_id' => 1
        ]);
        $response = $this->actingAs($user)
                        ->get('/cuenta/mensajes');
        $response->assertStatus(200);
    }
}
