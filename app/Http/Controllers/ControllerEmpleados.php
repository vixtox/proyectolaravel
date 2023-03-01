<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\dniValidarRule;
use App\Models\Empleado;
use Illuminate\Support\Facades\Hash;


class ControllerEmpleados extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function formInsertarEmpleado()
    {
        //
        return view('formRegistroEmpleados');
    }

    public function formInsertarEmpleadoVue()
    {
        //
        return view('registroEmpleadosVue');
    }

    public function insertarEmpleado()
    {
        $dataValidate = request()->validate([
            'dni' => ['required', new DniValidarRule],
            'nombre_apellidos' => 'required|min:5|max:50',
            'password' => 'required',
            'email' => 'required|email',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
            'direccion' => 'required',
            'fecha_alta' => 'required',
            'es_admin' => 'required'
        ]);

        $dataValidate['password'] = Hash::make($dataValidate['password']);

        Empleado::create($dataValidate);

        session()->flash('message', 'El empleado ha sido registrado correctamente.');
        $empleados = Empleado::orderBy('fecha_alta', 'desc')->paginate(5);
        return redirect()->route('listaEmpleados', compact('empleados'));
    }

    public function listarEmpleados()
    {
        $empleados = Empleado::orderBy('fecha_alta', 'desc')->paginate(5);

        return view('listaEmpleados', compact('empleados'));
    }

    public function listaEmpleadosVue()
    {
        return view('listaEmpleadosVue');
    }

    // public function listaEmpleadosVue()
    // {
    //     $empleado = new Empleado();
    //     $empleados = $empleado->obtenerEmpleados();
    //     $empleadosJson = json_encode($empleados);
    //     return view('listaEmpleadosVue', compact('empleadosJson'));
    // }

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

    public function formEditarEmpleado(Empleado $empleado)
    {
        return view('formEditarEmpleado', compact('empleado'));
    }

    public function editarEmpleado(Empleado $empleado)
    {

        $dataValidate = request()->validate([
            'dni' => ['required', new DniValidarRule],
            'nombre_apellidos' => 'required|min:5|max:50',
            // 'password'=>'required',
            'email' => 'required|email',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
            'direccion' => 'required',
            'fecha_alta' => 'required',
            'es_admin' => 'required'
        ]);

        // $dataValidate['password'] = Hash::make($dataValidate['password']);

        Empleado::where('id', $empleado->id)->update($dataValidate);

        session()->flash('message', 'El empleado ha sido actualizado correctamente.');
        return redirect()->route('listaEmpleados');
    }

    public function formEditarCuenta(Empleado $empleado)
    {
        //
        return view('formEditarCuenta', compact('empleado'));
    }

    public function editarCuenta(Empleado $empleado)
    {

        $dataValidate = request()->validate([
            'email' => 'required|email',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
            'direccion' => 'required',
            'fecha_alta' => 'required',
        ]);

        Empleado::where('id', $empleado->id)->update($dataValidate);

        session()->flash('message', 'Su cuenta ha sido actualizada correctamente.');
        return redirect()->route('listaEmpleados');
    }
}
