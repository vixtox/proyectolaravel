<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerDatosCuotasValidacion extends Controller
{
    //
    public function validacion(){
        request()->validate([
        'concepto'=>'required',
        'fechaEmision'=>'required|date',
        'importe'=>'required|numeric',
        'pagada'=>'required',
        'fechaPago'=>'required|date',
        'notas'=>'required'
    ]);

    return view('formCuotas');

    }

    }
