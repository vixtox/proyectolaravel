<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerFormCuotas extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function formInsertarCuota(Request $request)
    {
        //
        return view('formCuotas');
    }

    public function validacion(){
        request()->validate([
        'concepto'=>'required',
        'fechaEmision'=>'required|after:now',
        'importe'=>'required|numeric',
        'pagada'=>'required',
        'fechaPago'=>'required|after:now',
        'notas'=>'required'
    ]);

    return view('formCuotas');

    }

}
