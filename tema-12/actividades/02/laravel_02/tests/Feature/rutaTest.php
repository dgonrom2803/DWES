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
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testTestRoute()
    {
        $response = $this->get('/test');

        $response->assertStatus(200)
                 ->assertSeeText('Nombre: Diego, Módulo: DAW, Curso: 2, Prueba');
    }

    /**
     * Prueba la ruta /api/user.
     *
     * @return void
     */
    public function testApiUserRoute()
    {
        $response = $this->get('/api/user');

        $response->assertStatus(200)
                 ->assertSeeText('La tecnología avanza a una velocidad vertiginosa, pero el conocimiento y la creatividad humana siguen siendo la verdadera fuerza motriz detrás de la innovación informática');
    }

    /**
     * Prueba la ruta /user/{nombre}/{apellidos}.
     *
     * @return void
     */
    public function testUserRoute()
    {
        $response = $this->get('/user/Diego/García');

        $response->assertStatus(200)
                 ->assertSeeText('Nombre completo: Diego García');
    }

    /**
     * Prueba la ruta /user/view/{id?}.
     *
     * @return void
     */
    public function testUserViewRoute()
    {
        $response = $this->get('/user/view/1');

        $response->assertStatus(200)
                 ->assertSeeText('View: 1 (del usuario)');
    }

    /**
     * Prueba la ruta /user/view sin ID.
     *
     * @return void
     */
    public function testUserViewWithoutIdRoute()
    {
        $response = $this->get('/user/view');

        $response->assertStatus(200)
                 ->assertSeeText('View: (sin ID)');
    }

    /**
     * Prueba la ruta /ruta-con-dos-parametros/{edad}/{localidad?}.
     *
     * @return void
     */
    public function testRutaConDosParametrosRoute()
    {
        $response = $this->get('/ruta-con-dos-parametros/25');

        $response->assertStatus(200)
                 ->assertSeeText('Edad: 25');
    }

    /**
     * Prueba la ruta /ruta-con-dos-parametros/{edad}/{localidad?} con localidad.
     *
     * @return void
     */
    public function testRutaConDosParametrosWithLocalidadRoute()
    {
        $response = $this->get('/ruta-con-dos-parametros/25/Madrid');

        $response->assertStatus(200)
                 ->assertSeeText('Edad: 25, Localidad: Madrid');
    }

}
