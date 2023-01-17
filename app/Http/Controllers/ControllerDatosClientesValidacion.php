<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\cifValidarRule;

use App\Models\Cliente;

class ControllerDatosClientesValidacion extends Controller
{
    //
    public function validacion(){
        $dataValidate = request()->validate([
        'cif'=> ['required', new CifValidarRule],
        'nombre_apellidos'=>'required|min:5|max:50',
        'correo'=>'required|email',
        'telefono'=> 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
        'iban'=>'required',//|regex:/^ES\d{2}\s\d{4}\s\d{4}\s\d{2}\s\d{10}$/
        'cuota'=>'required|numeric',
        'pais'=>'required',
        'moneda'=>'required'
    ]);

    Cliente::create($dataValidate);

    session()->flash('message', 'El cliente ha sido registrado correctamente.');
    return redirect()->route('registroCliente');

    }

    }