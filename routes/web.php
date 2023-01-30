<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerTarea;
use App\Http\Controllers\ControllerEmpleados;
use App\Http\Controllers\ControllerClientes;
use App\Http\Controllers\ControllerCuotas;

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


// TAREAS----------------------------------------------------------------------------------------------------------

// Insertar
Route::get('/insertarTarea', [ControllerTarea::class, 'formularioInsertar'])->name('insertarTarea');
Route::post('insertarTarea', [ControllerTarea::class, 'insertarTarea'])->name('insertarTarea');
// Listar
Route::get('/listaTareas', [ControllerTarea::class, 'listarTareas'])->name('listaTareas');
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

// EMPLEADOS-----------------------------------------------------------------------------------------------------------

// Insertar
Route::get('/registroEmpleado', [ControllerEmpleados::class, 'formInsertarEmpleado'])->name('registroEmpleado');
Route::post('registroEmpleado', [ControllerEmpleados::class, 'insertarEmpleado']);
// Listar
Route::get('/listaEmpleados', [ControllerEmpleados::class, 'listarEmpleados'])->name('listaEmpleados');
// Borrar
Route::get('/confirmarBorrarEmpleado/{empleado}', [ControllerEmpleados::class, 'confirmarBorrarEmpleado'])->name('confirmarBorrarEmpleado');
Route::delete('/borrarEmpleado/{empleado}', [ControllerEmpleados::class, 'borrarEmpleado'])->name('borrarEmpleado');
// Editar
Route::get('/formEditarEmpleado/{empleado}', [ControllerEmpleados::class, 'formEditarEmpleado'])->name('formEditarEmpleado');
Route::post('editarEmpleado/{empleado}', [ControllerEmpleados::class, 'editarEmpleado'])->name('editarEmpleado');

// CUOTAS--------------------------------------------------------------------------------------------------------------

//Insertar
Route::get('/registroCuotas', [ControllerCuotas::class, 'formInsertarCuota'])->name('registroCuotas');
Route::post('registroCuotas', [ControllerCuotas::class, 'insertarCuota']);
// Listar
Route::get('/listaCuotas', [ControllerCuotas::class, 'listarCuotas'])->name('listaCuotas');
// Borrar
Route::get('/confirmarBorrarCuota/{cuota}', [ControllerCuotas::class, 'confirmarBorrarCuota'])->name('confirmarBorrarCuota');
Route::delete('/borrarCuota/{cuota}', [ControllerCuotas::class, 'borrarCuota'])->name('borrarCuota');