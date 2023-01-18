<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Provincia;
use App\Models\Tarea;

class ControllerFormInsertarTarea extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $clientes=Cliente::all();
        $empleados=Empleado::all();
        $provincias=Provincia::all();
        return view('formInsertarTarea', compact('clientes', 'empleados', 'provincias') );
     
    
    }

    public function listar()
    {
        $tareas = Tarea::orderBy('fecha_realizacion', 'desc')->paginate(10);
        return view('listaTareas', compact('tareas'));
    }

    public function borrarTarea(Request $request)
    {
        session()->flash('message', 'La tarea  ha sido borrada correctamente.');
        Tarea::find($request->id)->delete();
        //$tareas = Tarea::orderBy('fecha_realizacion', 'desc')->paginate(10);
        //return view('listaTareas', compact('tareas'));
        return redirect()->route('listaTareas');
    }

    public function confirmarBorrar(Request $request)
    {
        $tarea = Tarea::find($request->id);
        return view('confirmarBorrar', compact('tarea'));
    }

}
