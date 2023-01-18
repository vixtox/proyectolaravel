<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class ControllerDatosInsertarTareaValidacion extends Controller
{
    //
    public function validacion(){
        $dataValidate = request()->validate([
        'cliente'=>'required',
        'nombre_apellidos'=>'required|min:3|max:50',
        'descripcion'=>'required',
        'correo'=>'required|email',
        'telefono'=> 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
        'direccion'=>'required',
        'poblacion'=>'required',
        'codigo_postal' => ['required', 'regex:/^(0[1-9]|[1-4][0-9]|5[0-2])[0-9]{3}$/'],
        'provincia'=>'required',
        'estado'=>'required',
        'operario_encargado'=>'required',
        'fecha_realizacion'=>'required',
    ]);

    Tarea::create($dataValidate);

    session()->flash('message', 'La tarea ha sido registrada correctamente.');
    return redirect()->route('insertarTarea');

    }

}
