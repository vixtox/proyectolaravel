<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuota;
use App\Models\Cliente;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use PDF;

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
    
    $cuota = Cuota::create($dataValidate);
    $cliente = Cliente::where('id', $dataValidate['clientes_id'])->first();

    $pdf = PDF::loadView('factura', compact('cuota'));
    $pdf_content = $pdf->output();
    $subject = "Factura $cuota->id $cuota->concepto";
    $to = 'victormartinezdominguez84@gmail.com';
    $body = 'Ya esta disponible su factura, le adjuntamos documento';
  
    Mail::raw($body, function (Message $message) use ($to, $subject, $pdf_content) {
        $message->to($to)
            ->subject($subject)
            ->attachData($pdf_content, 'factura.pdf');
    });

    session()->flash('message', 'La cuota ha sido registrada correctamente.');
    return redirect()->route('listaCuotas');

    }

    public function enviarCorreo(Cuota $cuota)
    {
        $pdf = PDF::loadView('factura', compact('cuota'));
        $pdf_content = $pdf->output();
        $subject = "Factura $cuota->id $cuota->concepto";
        $to = 'victormartinezdominguez84@gmail.com';
        $body = 'Ya esta disponible su factura, le adjuntamos documento';
      
        Mail::raw($body, function (Message $message) use ($to, $subject, $pdf_content) {
            $message->to($to)
                ->subject($subject)
                ->attachData($pdf_content, 'factura.pdf');
        });
        session()->flash('message', 'El mensaje ha sido enviado correctamente.');
        return redirect()->route('listaCuotas');
    }

    public function formInsertarCuotaMensual(Request $request)
    {
        //
        $clientes=Cliente::all();
        return view('formCuotaMensual', compact('clientes') );

    }

    public function insertarCuotaMensual(){
        $dataValidate = request()->validate([
        'concepto'=>'required',
        'fecha_emision'=>'required|after:now',
        'notas'=>'required'
    ]);

    $clientes = Cliente::all();

        foreach ($clientes as $cliente) {
            $dataValidate['clientes_id'] = $cliente->id;
            $dataValidate['importe'] = $cliente->cuota;
            Cuota::create($dataValidate);
        }

        session()->flash('message', 'Las cuotas han sido creadas correctamente.');

        return redirect()->route('listaCuotas');

    }

    public function listarCuotas()
    {
        $cuotas = Cuota::orderBy('fecha_emision', 'desc')->paginate(10);

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

    public function formEditarCuota(Cuota $cuota)
    {
        $clientes=Cliente::all();
        return view('formEditarCuota', compact('clientes', 'cuota'));
    }

    public function editarCuota(Cuota $cuota){

        $dataValidate = request()->validate([
            'clientes_id'=>'required',
            'concepto'=>'required',
            'fecha_emision'=>'required',
            'importe'=>'required|numeric',
            'pagada'=>'',
            'fecha_pago'=>'',
            'notas'=>'required'
    ]);


    Cuota::where('id', $cuota->id)->update($dataValidate);

    session()->flash('message', 'La cuota ha sido actualizada correctamente.');
    return redirect()->route('listaCuotas');

    }

}
