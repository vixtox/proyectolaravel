<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerLogin extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        //dd(Auth::attempt($credentials));

        if (Auth::attempt($credentials)) {

            $empleado = Empleado::where('email', $request->email)->first();

            if ($empleado->es_admin === 1) {
                session(['administrador']);
                return redirect()->route('listaEmpleados');
            } else {
                //session(['operario' => $empleado->role]);
                return redirect()->route('listaTareasOperario');
            }
        }

        return redirect()->back()->withInput()->withErrors(['email' => 'Email o contraseña incorrectos']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function formRecuperarClave()
    {
        return view('formRecuperarClave');
    }
}