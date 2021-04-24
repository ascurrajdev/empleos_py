<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CuentaViewsTest extends TestCase
{
    /**
     * @test
     */
    public function obtenerVistaDeConfiguracionCuenta()
    {
        $response = $this->get('cuenta/configuracion');
        $response->assertStatus(200)
                ->assertViewIs('cuenta.configuracion');
    }

}
