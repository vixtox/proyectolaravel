<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\Cliente;
// use App\Models\Empleado;
// use App\Models\Provincia;
use App\Models\Tarea;

class ControllerTareaOperario extends Controller
{
    //
    public function listarTareasOperario()
    {
   
        if (Auth::check() && Auth::user()->es_admin === 1) {
            $tareas = Tarea::orderBy('fecha_realizacion', 'desc')->paginate(10);
        } else {
            $tareas = Tarea::where('empleados_id', Auth::user()->id)
                ->orderBy('fecha_realizacion', 'desc')
                ->paginate(10);
        }
        return view('listaTareas', compact('tareas'));

    }

    public function formCompletarTarea(Tarea $tarea)
    {
        return view('formCompletarTarea', compact('tarea'));
    }

    public function completarTarea(Tarea $tarea){

        $dataValidate = request()->validate([
        'estado' => 'required',
        'anotaciones_anteriores'=>'',
        'anotaciones_posteriores'=>'',
        'fichero'=>'file'
    ]);

    if (request()->hasFile('fichero')) {

        $fichero = request()->file('fichero');
        $nombre_fichero = $fichero->getClientOriginalName();
        $path = $fichero->storeAs('public/files', $nombre_fichero);

        $dataValidate['fichero'] = $nombre_fichero;
    }

    Tarea::where('id', $tarea->id)->update($dataValidate);

    session()->flash('message', 'La tarea ha sido completada correctamente.');
    return redirect()->route('listaTareasOperario');

    }

    public function detallesTareaOperario(Tarea $tarea)
    {

        return view('detallesTarea', compact('tarea'));
    }

}
