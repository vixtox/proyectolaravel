<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\dniValidarRule;
use App\Models\Empleado;

class ControllerDatosEmpleadosValidacion extends Controller
{
    //
    public function validacion(){
        $dataValidate = request()->validate([
        'dni'=> ['required', new DniValidarRule],
        'nombre_apellidos'=>'required|min:5|max:50',
        'correo'=>'required|email',
        'telefono'=> 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
        'direccion'=>'required',
        'fecha_alta'=>'required',
        'es_admin'=>'required'
    ]);

    Empleado::create($dataValidate);

    session()->flash('message', 'El empleado ha sido registrado correctamente.');
    return redirect()->route('registroEmpleado');
    //return view('formRegistroEmpleados');

    }

    }
