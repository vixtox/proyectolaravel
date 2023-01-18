<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::view('/registro_empleado', 'form_registro_empleados');

Route::get('/registroEmpleado', 'App\Http\Controllers\ControllerFormRegEmpleados')->name('registroEmpleado');

Route::post('registroEmpleado', 'App\Http\Controllers\ControllerDatosEmpleadosValidacion@validacion');

Route::get('/registroCliente', 'App\Http\Controllers\ControllerFormRegClientes')->name('registroCliente');

Route::post('registroCliente', 'App\Http\Controllers\ControllerDatosClientesValidacion@validacion');

Route::get('/registroCuotas', 'App\Http\Controllers\ControllerFormCuotas')->name('registroCuotas');

Route::post('registroCuotas', 'App\Http\Controllers\ControllerDatosCuotasValidacion@validacion');

Route::get('/insertarTarea', 'App\Http\Controllers\ControllerFormInsertarTarea')->name('insertarTarea');

Route::post('insertarTarea', 'App\Http\Controllers\ControllerDatosInsertarTareaValidacion@validacion');

Route::get('/listaTareas', 'App\Http\Controllers\ControllerFormInsertarTarea@listar')->name('listaTareas');

Route::get('/borrarTarea', 'App\Http\Controllers\ControllerFormInsertarTarea@borrarTarea')->name('borrarTarea');

Route::get('/confirmarBorrar', 'App\Http\Controllers\ControllerFormInsertarTarea@confirmarBorrar')->name('confirmarBorrar');