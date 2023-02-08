<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Provincia;
use App\Models\Tarea;

class ControllerTarea extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function formularioInsertar(Request $request)
    {
        //
        $clientes=Cliente::all();
        $empleados=Empleado::all();
        $provincias=Provincia::all();
        return view('formInsertarTarea', compact('clientes', 'empleados', 'provincias') );
    
    }

    public function listarTareas()
    {
        $tareas = Tarea::orderBy('fecha_realizacion', 'desc')->paginate(5);

        return view('listaTareas', compact('tareas'));
    }

    public function borrarTarea(Tarea $tarea)
    {
        $tarea->delete();
        session()->flash('message', 'La tarea ha sido borrada correctamente.');
        return redirect()->route('listaTareas');
    }

    public function confirmarBorrarTarea(Tarea $tarea)
    {
        return view('confirmarBorrarTarea', compact('tarea'));
    }

    public function detallesTarea(Tarea $tarea)
    {

        return view('detallesTarea', compact('tarea'));
    }

    public function insertarTarea(){

        $dataValidate = request()->validate([
        'clientes_id'=>'required',
        'nombre_apellidos'=>'required|min:3|max:50',
        'descripcion'=>'required',
        'correo'=>'required|email',
        'telefono'=> 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
        'direccion'=>'required',
        'poblacion'=>'required',
        'codigo_postal' => ['required', 'regex:/^(0[1-9]|[1-4][0-9]|5[0-2])[0-9]{3}$/'],
        'provincias_id'=>'required',
        'estado'=>'required',
        'empleados_id'=>'required',
        'fecha_realizacion'=>'required|after:now'
    ]);

    Tarea::create($dataValidate);

    session()->flash('message', 'La tarea ha sido registrada correctamente.');
    return redirect()->route('listaTareas');

    }

    public function formEditarTarea(Tarea $tarea)
    {
        $clientes=Cliente::all();
        $empleados=Empleado::all();
        $provincias=Provincia::all();
        return view('formEditarTarea', compact('clientes', 'empleados', 'provincias', 'tarea'));
    }

    public function editarTarea(Tarea $tarea){

        $dataValidate = request()->validate([
        'clientes_id'=>'required',
        'nombre_apellidos'=>'required|min:3|max:50',
        'descripcion'=>'required',
        'correo'=>'required|email',
        'telefono'=> 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
        'direccion'=>'required',
        'poblacion'=>'required',
        'codigo_postal' => ['required', 'regex:/^(0[1-9]|[1-4][0-9]|5[0-2])[0-9]{3}$/'],
        'provincias_id'=>'required',
        'estado'=>'required',
        'empleados_id'=>'required',
        'fecha_realizacion'=>'required|after:now',
        'anotaciones_anteriores'=>'',
        'anotaciones_posteriores'=>''
    ]);


    Tarea::where('id', $tarea->id)->update($dataValidate);

    session()->flash('message', 'La tarea ha sido actualizada correctamente.');
    return redirect()->route('listaTareas');

    }

    public function formCompletarTarea(Tarea $tarea)
    {
        return view('formCompletarTarea');
    }

    public function completarTarea(Tarea $tarea){

        $dataValidate = request()->validate([
        'anotaciones_anteriores'=>'',
        'anotaciones_posteriores'=>'',
        'fichero'=>''
    ]);

    $fichero = request()->file('fichero');
    $nombre_original = $fichero->getClientOriginalName();
    $path = $fichero->storeAs('public/files', $nombre_original);

    $datos['fichero'] = $nombre_original;


    Tarea::where('id', $tarea->id)->update($dataValidate);

    session()->flash('message', 'La tarea ha sido completada correctamente.');
    return redirect()->route('listaTareas');

    }

}
