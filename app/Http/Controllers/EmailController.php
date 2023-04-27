<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function enviarCorreo(Request $request)
    {

        $nombre = $request->input('nombre'); //Emisor
        $asunto = $request->input('asunto'); //Emisor
        $email = $request->input('email'); //Emisor
        $mensaje = $request->input('mensaje'); //Emisor
        $para = 'Nosotros@gmail.com'; //Receptor

        Mail::send('correo.email', $request->all(), function ($msg) use ($nombre, $asunto, $email, $para) {

            $msg->from($email, $nombre); //Para saber de quien fue enviado el correo
            $msg->subject($asunto); // Asunto
            $msg->to($para); //quien va a recibir el mensaje
        });

        return view('welcome');
    }
}
