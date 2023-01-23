<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerFormInsertarTarea;
use App\Http\Controllers\ControllerFormRegEmpleados;
use App\Http\Controllers\ControllerFormRegClientes;
use App\Http\Controllers\ControllerFormCuotas;

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

Route::get('/registroEmpleado', [ControllerFormRegEmpleados::class, 'formInsertarEmpleado'])->name('registroEmpleado');

Route::post('registroEmpleado', [ControllerFormRegEmpleados::class, 'validacion']);

Route::get('/registroCliente', [ControllerFormRegClientes::class, 'formInsertarCliente'])->name('registroCliente');

Route::post('registroCliente', [ControllerFormRegClientes::class, 'validacion']);

Route::get('/registroCuotas', [ControllerFormCuotas::class, 'formInsertarCuota'])->name('registroCuotas');

Route::post('registroCuotas', [ControllerFormCuotas::class, 'validacion']);

Route::get('/insertarTarea', [ControllerFormInsertarTarea::class, 'formularioInsertar'])->name('insertarTarea');

Route::post('insertarTarea', [ControllerFormInsertarTarea::class, 'validacion'])->name('insertarTarea');

Route::delete('/borrarTarea/{tarea}', [ControllerFormInsertarTarea::class, 'borrarTarea'])->name('borrarTarea');

Route::delete('/borrarEmpleado/{empleado}', [ControllerFormRegEmpleados::class, 'borrarEmpleado'])->name('borrarEmpleado');

Route::delete('/borrarCliente/{cliente}', [ControllerFormRegClientes::class, 'borrarCliente'])->name('borrarCliente');

Route::get('/listaTareas', [ControllerFormInsertarTarea::class, 'listarTareas'])->name('listaTareas');

Route::get('/listaEmpleados', [ControllerFormRegEmpleados::class, 'listarEmpleados'])->name('listaEmpleados');

Route::get('/listaClientes', [ControllerFormRegClientes::class, 'listarClientes'])->name('listaClientes');

Route::get('/confirmarBorrar/{tarea}', [ControllerFormInsertarTarea::class, 'confirmarBorrar'])->name('confirmarBorrar');

Route::get('/confirmarBorrarEmpleado/{empleado}', [ControllerFormRegEmpleados::class, 'confirmarBorrarEmpleado'])->name('confirmarBorrarEmpleado');

Route::get('/confirmarBorrarCliente/{cliente}', [ControllerFormRegClientes::class, 'confirmarBorrarCliente'])->name('confirmarBorrarCliente');

Route::get('/detallesTarea/{tarea}', [ControllerFormInsertarTarea::class, 'detallesTarea'])->name('detallesTarea');