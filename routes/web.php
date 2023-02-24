<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerTarea;
use App\Http\Controllers\ControllerTareaOperario;
use App\Http\Controllers\ControllerEmpleados;
use App\Http\Controllers\ControllerClientes;
use App\Http\Controllers\ControllerCuotas;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ControllerGithub;
use App\Http\Controllers\ControllerPaypal;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Inicio de sesion con Github
Route::get('/github', [ControllerGithub::class, 'redirectToProvider'])->name('github');
Route::get('/githubcallback', [ControllerGithub::class, 'handleProviderCallback'])->name('githubcallback');

// Route::get('/email',[EmailController::class, 'store'])->name('email');

Route::get('/generatePDF/{cuota}', FacturaController::class)->name('generatePDF');

// LOGIN----------------------------------------------------------------------------------------------------------

Route::get('/', function () {
    return view('login');
});

Route::post('/', [ControllerLogin::class, 'login'])->name('login');
Route::post('logout', [ControllerLogin::class, 'logout'])->name('logout');

// RECUPERAR CLAVE
Route::get('/recuperarClave', [ControllerLogin::class, 'formRecuperarClave'])->name('recuperarClave');
Route::post('recuperarClave', [EmailController::class, 'checkEmpleado']);
Route::get('/generatePass', [EmailController::class, 'generatePass'])->name('generatePass');

// FORMULARIO TAREA CLIENTE----------------------------------------------------------------------------------------------------

   // Insertar
Route::get('/insertarTareaCliente', [ControllerTarea::class, 'formularioInsertarTareaCliente'])->name('insertarTareaCliente');
Route::post('insertarTareaCliente', [ControllerTarea::class, 'insertarTareaCliente'])->name('insertarTareaCliente');

// ------------------------------------------------------------------------------------------------------------------------------
// FUNCIONES ADMINISTRADOR-------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------------

Route::middleware(['auth'])->group(function () {

    Route::middleware(['administrador'])->group(function () {
        // TAREAS----------------------------------------------------------------------------------------------------------
        // Listar
        Route::get('/listaTareas', [ControllerTarea::class, 'listarTareas'])->name('listaTareas');
        // Insertar
        Route::get('/insertarTarea', [ControllerTarea::class, 'formularioInsertar'])->name('insertarTarea');
        Route::post('insertarTarea', [ControllerTarea::class, 'insertarTarea'])->name('insertarTarea');
        // Borrar
        Route::get('/confirmarBorrarTarea/{tarea}', [ControllerTarea::class, 'confirmarBorrarTarea'])->name('confirmarBorrarTarea');
        Route::delete('/borrarTarea/{tarea}', [ControllerTarea::class, 'borrarTarea'])->name('borrarTarea');
        // Detalles
        Route::get('/detallesTarea/{tarea}', [ControllerTarea::class, 'detallesTarea'])->name('detallesTarea');
        // Editar
        Route::get('/formEditarTarea/{tarea}', [ControllerTarea::class, 'formEditarTarea'])->name('formEditarTarea');
        Route::post('editarTarea/{tarea}', [ControllerTarea::class, 'editarTarea'])->name('editarTarea');
        // CLIENTES----------------------------------------------------------------------------------------------------------
        // Insertar
        Route::get('/registroCliente', [ControllerClientes::class, 'formInsertarCliente'])->name('registroCliente');
        Route::post('registroCliente', [ControllerClientes::class, 'insertarCliente']);
        // Listar
        Route::get('/listaClientes', [ControllerClientes::class, 'listarClientes'])->name('listaClientes');
        // Borrar 
        Route::get('/confirmarBorrarCliente/{cliente}', [ControllerClientes::class, 'confirmarBorrarCliente'])->name('confirmarBorrarCliente');
        Route::delete('/borrarCliente/{cliente}', [ControllerClientes::class, 'borrarCliente'])->name('borrarCliente');
        // Editar
        Route::get('/formEditarCliente/{cliente}', [ControllerClientes::class, 'formEditarCliente'])->name('formEditarCliente');
        Route::post('editarCliente/{cliente}', [ControllerClientes::class, 'editarCliente'])->name('editarCliente');
        // EMPLEADOS-----------------------------------------------------------------------------------------------------------
        // Insertar
        Route::get('/registroEmpleado', [ControllerEmpleados::class, 'formInsertarEmpleado'])->name('registroEmpleado');
        Route::post('registroEmpleado', [ControllerEmpleados::class, 'insertarEmpleado']);
        // Listar
        // Route::get('/listaEmpleados', [ControllerEmpleados::class, 'listarEmpleados'])->name('listaEmpleados');
        Route::middleware(['administrador'])->group(function () {
            Route::get('/listaEmpleados', [ControllerEmpleados::class, 'listarEmpleados'])->name('listaEmpleados');
        });
        // Borrar
        Route::get('/confirmarBorrarEmpleado/{empleado}', [ControllerEmpleados::class, 'confirmarBorrarEmpleado'])->name('confirmarBorrarEmpleado');
        Route::delete('/borrarEmpleado/{empleado}', [ControllerEmpleados::class, 'borrarEmpleado'])->name('borrarEmpleado');
        // Editar
        Route::get('/formEditarEmpleado/{empleado}', [ControllerEmpleados::class, 'formEditarEmpleado'])->name('formEditarEmpleado');
        Route::post('editarEmpleado/{empleado}', [ControllerEmpleados::class, 'editarEmpleado'])->name('editarEmpleado');
        Route::get('/formEditarCuenta/{empleado}', [ControllerEmpleados::class, 'formEditarCuenta'])->name('formEditarCuenta');
        Route::post('editarCuenta/{empleado}', [ControllerEmpleados::class, 'editarCuenta'])->name('editarCuenta');
        
        // CUOTAS--------------------------------------------------------------------------------------------------------------
        //Insertar
        Route::get('/registroCuotas', [ControllerCuotas::class, 'formInsertarCuota'])->name('registroCuotas');
        Route::post('registroCuotas', [ControllerCuotas::class, 'insertarCuota']);
        Route::get('/registroCuotaMensual', [ControllerCuotas::class, 'formInsertarCuotaMensual'])->name('registroCuotaMensual');
        Route::post('registroCuotaMensual', [ControllerCuotas::class, 'insertarCuotaMensual']);
        // Listar
        Route::get('/listaCuotas', [ControllerCuotas::class, 'listarCuotas'])->name('listaCuotas');
        // Borrar
        Route::get('/confirmarBorrarCuota/{cuota}', [ControllerCuotas::class, 'confirmarBorrarCuota'])->name('confirmarBorrarCuota');
        Route::delete('/borrarCuota/{cuota}', [ControllerCuotas::class, 'borrarCuota'])->name('borrarCuota');
        // Editar
        Route::get('/formEditarCuota/{cuota}', [ControllerCuotas::class, 'formEditarCuota'])->name('formEditarCuota');
        Route::post('editarCuota/{cuota}', [ControllerCuotas::class, 'editarCuota'])->name('editarCuota');
        // Enviar correo
        Route::get('/enviarCorreo/{cuota}', [ControllerCuotas::class, 'enviarCorreo'])->name('enviarCorreo');
        // PAYPAL
        Route::get('/paypal/pagar', [ControllerPaypal::class, 'pagarConPaypal'])->name('formularioPaypal');
        Route::get('/paypal/status', [ControllerPaypal::class, 'paypalStatus'])->name('paypalStatus');
    });

    // FUNCIONES OPERARIO
    Route::middleware(['operario'])->group(function () {
        // Completar
        Route::get('/formCompletarTarea/{tarea}', [ControllerTareaOperario::class, 'formCompletarTarea'])->middleware('verificarempleadotarea')->name('formCompletarTarea');
        Route::post('completarTarea/{tarea}', [ControllerTareaOperario::class, 'completarTarea'])->name('completarTarea');
        // Listar
        Route::get('/listaTareasOperario', [ControllerTareaOperario::class, 'listarTareasOperario'])->name('listaTareasOperario');
        // Detalles
        Route::get('/detallesTareaOperario/{tarea}', [ControllerTareaOperario::class, 'detallesTareaOperario'])->middleware('verificarempleadotarea')->name('detallesTareaOperario');
    });
});
