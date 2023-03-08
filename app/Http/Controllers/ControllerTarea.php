<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Provincia;
use App\Models\Tarea;

class ControllerTarea extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function formularioInsertar(Request $request)
    {
        //
        $clientes=Cliente::all();
        $empleados=Empleado::all();
        $provincias=Provincia::all();
        return view('formInsertarTarea', compact('clientes', 'empleados', 'provincias') );
    
    }

    public function insertarTarea(){

        $dataValidate = request()->validate([
        'clientes_id'=>'required',
        'nombre_apellidos'=>'required|min:3|max:50',
        'descripcion'=>'required',
        'correo'=>'required|email',
        'telefono'=> 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
        'direccion'=>'required',
        'poblacion'=>'required',
        'codigo_postal' => ['required', 'regex:/^(0[1-9]|[1-4][0-9]|5[0-2])[0-9]{3}$/'],
        'provincias_id'=>'required',
        'estado'=>'required',
        'empleados_id'=>'required',
        'fecha_realizacion'=>'required|after:now'
    ]);

    Tarea::create($dataValidate);

    session()->flash('message', 'La tarea ha sido registrada correctamente.');
    return redirect()->route('listaTareas');

    }

    public function listarTareas()
    {
        $tareas = Tarea::orderBy('fecha_realizacion', 'desc')->paginate(5);
      
        return view('listaTareas', compact('tareas'));

    }

    public function borrarTarea(Tarea $tarea)
    {
        $tarea->delete();
        session()->flash('message', 'La tarea ha sido borrada correctamente.');
        return redirect()->route('listaTareas');
    }

    public function confirmarBorrarTarea(Tarea $tarea)
    {
        return view('confirmarBorrarTarea', compact('tarea'));
    }

    public function detallesTarea(Tarea $tarea)
    {

        return view('detallesTarea', compact('tarea'));
    }

    public function formEditarTarea(Tarea $tarea)
    {
        $clientes=Cliente::all();
        $empleados=Empleado::all();
        $provincias=Provincia::all();
        return view('formEditarTarea', compact('clientes', 'empleados', 'provincias', 'tarea'));
    }

    public function editarTarea(Tarea $tarea){

        $dataValidate = request()->validate([
        'clientes_id'=>'required',
        'nombre_apellidos'=>'required|min:3|max:50',
        'descripcion'=>'required',
        'correo'=>'required|email',
        'telefono'=> 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
        'direccion'=>'required',
        'poblacion'=>'required',
        'codigo_postal' => ['required', 'regex:/^(0[1-9]|[1-4][0-9]|5[0-2])[0-9]{3}$/'],
        'provincias_id'=>'required',
        'estado'=>'required',
        'empleados_id'=>'required',
        'fecha_realizacion'=>'required|after:now',
        'anotaciones_anteriores'=>'',
        'anotaciones_posteriores'=>'',
        'fichero'=>'file'
    ]);

    if (request()->hasFile('fichero')) {

        $fichero = request()->file('fichero');
        $nombre_fichero = $fichero->getClientOriginalName();
        $path = $fichero->storeAs('public/files', $nombre_fichero);

        $dataValidate['fichero'] = $nombre_fichero;
    }



    Tarea::where('id', $tarea->id)->update($dataValidate);

    session()->flash('message', 'La tarea ha sido actualizada correctamente.');
    return redirect()->route('listaTareas');

    }

    public function formularioInsertarTareaCliente(Request $request)
    {
        //
        $clientes=Cliente::all();
        $empleados=Empleado::all();
        $provincias=Provincia::all();
        return view('formInsertarTareaCliente', compact('provincias') );
    
    }

    public function insertarTareaCliente(){

        $dataValidate = request()->validate([
        'cif_cliente'=>'required',
        'telefono_cliente'=>'required',
        'clientes_id' => '',
        'nombre_apellidos'=>'required|min:3|max:50',
        'descripcion'=>'required',
        'correo'=>'required|email',
        'telefono'=> 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
        'direccion'=>'required',
        'poblacion'=>'required',
        'codigo_postal' => ['required', 'regex:/^(0[1-9]|[1-4][0-9]|5[0-2])[0-9]{3}$/'],
        'provincias_id'=>'required',
        'empleados_id' => '',
        'fecha_realizacion'=>'required|after:now'
    ]);
 
    $cliente = Cliente::where('cif', $dataValidate['cif_cliente'])
            ->where('telefono', $dataValidate['telefono_cliente'])
            ->first();
         
        if (
            $cliente != null
        ) {
                        //Quitamos la información de comprobar cliente
                        unset($dataValidate['cliente_cif']);
                        unset($dataValidate['telefono_cliente']);
            
                        $dataValidate['estado'] = "P";
                        $dataValidate['clientes_id'] = $cliente->id;
            
                        Tarea::create($dataValidate);
            
                        // dd($dataValidate);
                        session()->flash('message', 'La tarea ha sido registrada correctamente.');
                        return redirect()->route('insertarTareaCliente');
                    }
                    session()->flash('error', 'El cliente introducido no existe.');
                    return redirect()->route('insertarTareaCliente');
            }

}

?>