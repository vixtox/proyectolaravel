<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\dniValidarRule;
use App\Models\Empleado;


class ControllerFormRegEmpleados extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function formInsertarEmpleado(Request $request)
    {
        //
        return view('formRegistroEmpleados');
    }

    public function validacion(){
        $dataValidate = request()->validate([
        'dni'=> ['required', new DniValidarRule],
        'nombre_apellidos'=>'required|min:5|max:50',
        'correo'=>'required|email',
        'telefono'=> 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
        'direccion'=>'required',
        'fecha_alta'=>'required|after:now',
        'es_admin'=>'required'
    ]);

    Empleado::create($dataValidate);

    session()->flash('message', 'El empleado ha sido registrado correctamente.');
    return redirect()->route('registroEmpleado');

    }

    public function listarEmpleados()
    {
        $empleados = Empleado::orderBy('fecha_alta', 'desc')->paginate(5);

        return view('listaEmpleados', compact('empleados'));
    }

    public function borrarEmpleado(Empleado $empleado)
    {
        $empleado->delete();
        session()->flash('message', 'El empleado ha sido borrado correctamente.');
        return redirect()->route('listaEmpleados');
    }

    public function confirmarBorrarEmpleado(Empleado $empleado)
    {
        return view('confirmarBorrarEmpleado', compact('empleado'));
    }

}
