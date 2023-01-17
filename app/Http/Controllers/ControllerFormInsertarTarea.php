<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Provincia;

class ControllerFormInsertarTarea extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $clientes=Cliente::all();
        $empleados=Empleado::all();
        $provincias=Provincia::all();
        return view('formInsertarTarea', compact('clientes', 'empleados', 'provincias') );
     
    
    }
}
