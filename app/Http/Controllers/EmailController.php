<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NosecaenMail;

class EmailController extends Controller
{
    //
    public function store(Request $request){

        $message=[
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'content'=>$request->content,
            'archivo'=>$request->archivo
        ];
        Mail::to($message['email'])->send(new NosecaenMail($message));
        return redirect()->route('contact')->with('status','Email enviado correctamente');
    
    }
}
