<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuota;
use App\Models\Cliente;

class ControllerCuotas extends Controller
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

    public function insertarCuota(){
        $dataValidate = request()->validate([
        'clientes_id'=>'required',
        'concepto'=>'required',
        'fecha_emision'=>'required',
        'importe'=>'required|numeric',
        'pagada'=>'',
        'fecha_pago'=>'',
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

    public function borrarCuota(Cuota $cuota)
    {
        $cuota->delete();
        session()->flash('message', 'La cuota ha sido borrada correctamente.');
        return redirect()->route('listaCuotas');
    }

    public function confirmarBorrarCuota(Cuota $cuota)
    {
        return view('confirmarBorrarCuota', compact('cuota'));
    }

    // Remesa Mensual:

    public function validarInsertar()
    {
        $data = request()->validate([
            'concepto' => 'required',
            'fecha_emision' => 'required',
            'notas' => 'required',
        ]);

        $clientes = Cliente::all();

        foreach ($clientes as $cliente) {
            $data['clientes_id'] = $cliente->id;
            $data['importe'] = $cliente->cuota_mensual;
            Cuota::create($data);
        }

        session()->flash('message', 'La cuota ha sido creada correctamente.');

        return redirect()->route('formCuotas');
    }

}
