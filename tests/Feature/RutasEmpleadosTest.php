<?php

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Empleado;

class RutasEmpleadosTest extends TestCase
{

    //Menu principal, noticias

    public function test_registroEmpleado()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formRegistroEmpleados'
        $response = $this->get(route('registroEmpleado'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formRegistroEmpleados' fue cargada
        $response->assertViewIs('formRegistroEmpleados');
    }

    public function test_listaEmpleados()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/listaEmpleados'
        $response = $this->get(route('listaEmpleados'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'listaEmpleados' fue cargada
        $response->assertViewIs('listaEmpleados');
    }

    public function test_confirmarBorrarEmpleado()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/confirmarBorrarEmpleado'
        $response = $this->get(route('confirmarBorrarEmpleado', ['empleado' => 26]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'confirmarBorrarEmpleado' fue cargada
        $response->assertViewIs('confirmarBorrarEmpleado');
    }
    
    public function test_formEditarEmpleado()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formEditarEmpleado'
        $response = $this->get(route('formEditarEmpleado', ['empleado' => 26]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formEditarEmpleado' fue cargada
        $response->assertViewIs('formEditarEmpleado');
    }

    public function test_formEditarCuenta()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formEditarCuenta'
        $response = $this->get(route('formEditarCuenta', ['empleado' => 26]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formEditarCuenta' fue cargada
        $response->assertViewIs('formEditarCuenta');
    }

}