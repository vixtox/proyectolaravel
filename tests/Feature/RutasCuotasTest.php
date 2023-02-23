<?php

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Empleado;

class RutasCuotasTest extends TestCase
{

    //Menu principal, noticias

    public function test_registroCuotas()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/registroCuotas'
        $response = $this->get(route('registroCuotas'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formCuotas' fue cargada
        $response->assertViewIs('formCuotas');
    }

    public function test_registroCuotaMensual()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/registroCuotaMensual'
        $response = $this->get(route('registroCuotaMensual'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'registroCuotaMensual' fue cargada
        $response->assertViewIs('formCuotaMensual');
    }

    public function test_listaCuotas()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/listaCuotas'
        $response = $this->get(route('listaCuotas'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'listaCuotas' fue cargada
        $response->assertViewIs('listaCuotas');
    }

    public function test_confirmarBorrarCuota()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/mensajeBorrarCuota'
        $response = $this->get(route('confirmarBorrarCuota', ['cuota' => 110]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'mensajeBorrarCuota' fue cargada
        $response->assertViewIs('confirmarBorrarCuota');
    }

    public function test_formEditarCuota()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/mensajeBorrarCuota'
        $response = $this->get(route('formEditarCuota', ['cuota' => 110]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'mensajeBorrarCuota' fue cargada
        $response->assertViewIs('formEditarCuota');
    }
   
}