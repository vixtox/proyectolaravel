<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\dniValidarRule;

class ControllerDatosValidacion extends Controller
{
    //
    public function validacion(){
        request()->validate([
        'dni'=> ['required', new DniValidarRule],
        'nombre'=>'required|min:5|max:50',
        'correo'=>'required|email',
        'telefono'=> 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
        'direccion'=>'required',
        'tipo'=>'required'
    ]);

    return view('form_registro_empleados');

    }

    }
