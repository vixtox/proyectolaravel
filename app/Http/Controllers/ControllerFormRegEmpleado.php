<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerFormRegEmpleado extends Controller
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
        return view('form_registro_empleados');
    }
}
