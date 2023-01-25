<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuota;
use App\Models\Cliente;

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
        $clientes=Cliente::all();
        return view('formCuotas', compact('clientes') );

    }

    public function validacion(){
        $dataValidate = request()->validate([
        'cliente'=>'required',
        'concepto'=>'required',
        'fecha_emision'=>'required|after:now',
        'importe'=>'required|numeric',
        'pagada'=>'required',
        'fecha_pago'=>'required|after:now',
        'notas'=>'required'
    ]);

    
    Cuota::create($dataValidate);

    session()->flash('message', 'La cuota ha sido registrado correctamente.');
    return redirect()->route('listaCuotas');

    }

    public function listarCuotas()
    {
        $cuotas = Cuota::orderBy('fecha_emision', 'desc')->paginate(5);

        return view('listaCuotas', compact('cuotas'));
    }

}
