<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use App\Models\Empleado;
use Illuminate\Support\Facades\Hash;

class EmailController extends Controller
{
    //
    public $password;

    public function __construct() {
        // $this->password = $this->generatePass();
        $this->password = '1111';
    }

    public function store()
    {
      
        $to = 'victormartinezdominguez84@gmail.com';
        $subject = 'Correo de prueba';
        $body = 'Este es un correo electrónico para enviarle una nueva contraseña: ' . $this->password;
      
        Mail::raw($body, function (Message $message) use ($to, $subject) {
            $message->to($to)
                ->subject($subject);
        });

 
    }

    public function checkEmpleado(Request $request)
    {
       
        $dataValidate = request()->validate([
            'email' => 'required',
            'dni' => 'required',
        ]);

        $empleado = Empleado::where('dni', $dataValidate['dni'])
            ->where('email', $dataValidate['email'])
            ->first();
        // $empleado = Empleado::where('email', $dataValidate['email'])->first();

        if ($empleado != null) {
          
            $empleado->update(['password' => Hash::make($this->password)]);
        
            $this->store();
            session()->flash('message', 'Se ha enviado la nueva contraseña a su email.');
            return redirect('/recuperarClave');
 
        }else{
            session()->flash('error', 'El usuario introducido no existe.');
       
            return redirect('/recuperarClave');
        }
     

    }

    public function generatePass()
    {
     
        $password = '';
        $length = 8;

        // Generar la contraseña aleatoria
        $upper = false;
        $number = false;
        while (strlen($password) < $length || !$upper || !$number) {
            $char = chr(random_int(33, 126));
            if (ctype_upper($char)) {
                $upper = true;
            } elseif (ctype_digit($char)) {
                $number = true;
            }
            $password .= $char;
        }
        return $password;
    }
}
