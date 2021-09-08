<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;
use Hash;

class CuentaViewsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function obtenerVistaDeConfiguracionCuentaSinAutorizacion()
    {
        $response = $this->get('cuenta/configuracion');
        $response->assertStatus(302);
    }

    /**
     * @test
     */
    public function obtenerVistaDeConfiguracionCuentaConAutorizacion(){
        $user = User::factory()->make();
        $response = $this->actingAs($user)
                        ->get('cuenta/configuracion');
        $response->assertStatus(200);
    }

}
