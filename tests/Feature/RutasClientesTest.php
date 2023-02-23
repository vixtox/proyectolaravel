<?php

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Empleado;

class RutasClientesTest extends TestCase
{

    //Menu principal, noticias

    public function test_registroCliente()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/listaTareas'
        $response = $this->get(route('registroCliente'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'listaTareas' fue cargada
        $response->assertViewIs('formRegistroClientes');
    }

    public function test_listaClientes()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/listaTareas'
        $response = $this->get(route('listaClientes'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'listaTareas' fue cargada
        $response->assertViewIs('listaClientes');
    }

    public function test_confirmarBorrarCliente()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/confirmarBorrarCliente'
        $response = $this->get(route('confirmarBorrarCliente', ['cliente' => 21]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'confirmarBorrarCliente' fue cargada
        $response->assertViewIs('confirmarBorrarCliente');
    }

    public function test_formEditarCliente()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formEditarCliente'
        $response = $this->get(route('formEditarCliente', ['cliente' => 21]));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formEditarCliente' fue cargada
        $response->assertViewIs('formEditarCliente');
    }

    public function test_registroCuotas()
    {
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();

        $response = $this->actingAs($user)
            ->post('cliente', [
                'id' => 21,
                'cif' => 'R3797253F',
                'nombre_apellidos' => 'Max Power',
                'telefono' => '645666379',
                'correo' => 'max@gmail.com',
                'iban' => 'ES1201289314409759879743',
                'cuota' => '90',
                'moneda' => 'EUR',
            ]);

        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
        $response = $this->get(route('registroCliente'));

        $response->assertStatus(200);

        $response->assertViewIs('formRegistroClientes');
    }

}