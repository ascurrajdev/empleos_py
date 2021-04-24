<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostulacionesUserTest extends TestCase
{
    /**
     * @test
     */
    public function obtenerVistaDePostulacionesEmpleosDelUsuario()
    {
        $response = $this->get('/postulaciones');
        $response->assertStatus(200)
                ->assertViewIs('postulaciones.index');
    }
}
