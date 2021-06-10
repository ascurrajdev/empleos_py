<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;
use Hash;

class PostServiceTest extends TestCase
{
    /**
     * @test
     */
    public function registroService()
    {
        $user = User::factory()->make([
            'name' => 'Jose Ascurra',
            'email' => 'joseascurra123@gmail.com',
            'password' => Hash::make('5286721/*-+'),
            'role_id' => 1
        ]);
        
        $this->assertTrue(true);
    }
}
