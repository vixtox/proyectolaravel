<?php

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Empleado;

class RutasLoginTest extends TestCase
{

    //Menu principal, noticias

    public function test_login()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/login'
        $response = $this->get(route('login'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'login' fue cargada
        $response->assertViewIs('login');
    }

    public function test_recuperarClave()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/recuperarClave'
        $response = $this->get(route('recuperarClave'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formRecuperarClave' fue cargada
        $response->assertViewIs('formRecuperarClave');
    }
   
}