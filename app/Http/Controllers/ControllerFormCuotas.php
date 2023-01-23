<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuota;

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
        $dataValidate = request()->validate([
        'concepto'=>'required',
        'fecha_emision'=>'required|after:now',
        'importe'=>'required|numeric',
        'pagada'=>'required',
        'fecha_pago'=>'required|after:now',
        'notas'=>'required'
    ]);

    
    Cuota::create($dataValidate);

    session()->flash('message', 'La cuota ha sido registrado correctamente.');
    return view('formCuotas');

    }

}
