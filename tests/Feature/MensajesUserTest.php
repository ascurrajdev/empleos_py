<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;
use Hash;

class MensajesUserTest extends TestCase
{
    use RefreshDatabase;
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
        $user = User::factory()->make();
        $response = $this->actingAs($user)
                        ->get('/cuenta/mensajes');
        $response->assertStatus(200);
    }
}
