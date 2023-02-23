<?php

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Empleado;

class RutasTareasTest extends TestCase
{

    //Menu principal, noticias

    public function test_listaTareas()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/listaTareas'
        $response = $this->get(route('listaTareas'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'listaTareas' fue cargada
        $response->assertViewIs('listaTareas');
    }

    public function test_insertarTarea()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/insertarTarea'
        $response = $this->get(route('insertarTarea'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formInsertarTarea' fue cargada
        $response->assertViewIs('formInsertarTarea');

    }

    public function test_confirmarBorrarTarea()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/confirmarBorrarTarea'
        $response = $this->get(route('confirmarBorrarTarea', ['tarea' => 50]));
   
        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'confirmarBorrarTarea' fue cargada
        $response->assertViewIs('confirmarBorrarTarea');

    }

    public function test_detallesTarea()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/detallesTarea'
        $response = $this->get(route('detallesTarea', ['tarea' => 50]));
   
        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'detallesTarea' fue cargada
        $response->assertViewIs('detallesTarea');

    }

    public function test_formEditarTarea()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'ernesto@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formEditarTarea'
        $response = $this->get(route('formEditarTarea', ['tarea' => 50]));
   
        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formEditarTarea' fue cargada
        $response->assertViewIs('formEditarTarea');

    }

    public function test_formCompletarTarea()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'tolomeo@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formCompletarTarea'
        $response = $this->get(route('formCompletarTarea', ['tarea' => 50]));
   
        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formCompletarTarea' fue cargada
        $response->assertViewIs('formCompletarTarea');

    }

    public function test_listaTareasOperario()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'tolomeo@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/listaTareasOperario'
        $response = $this->get(route('listaTareasOperario'));
   
        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'listaTareas' fue cargada
        $response->assertViewIs('listaTareas');

    }

    public function test_detallesTareaOperario()
    {

        //Autenticar al usuario
        $user = Empleado::where('email', 'tolomeo@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/detallesTareaOperario'
        $response = $this->get(route('detallesTareaOperario', ['tarea' => 50]));
   
        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'detallesTareaOperario' fue cargada
        $response->assertViewIs('detallesTarea');

    }

    public function test_insertarTareaCliente()
    {

        // Simulamos una petición GET a la ruta '/insertarTareaCliente'
        $response = $this->get(route('insertarTareaCliente'));
   
        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'insertarTareaCliente' fue cargada
        $response->assertViewIs('formInsertarTareaCliente');

    }

}