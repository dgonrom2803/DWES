<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class rutaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/clients');

        $response->assertStatus(200);
        $response->assertSee('Clientes');
    }
    public function test_example_02(): void
    {
        $response = $this->get('/cliens');

        $response->assertStatus(404);
    }
}