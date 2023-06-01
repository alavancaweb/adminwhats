<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;

class ContactForm extends Controller
{
    //

     //
     private $nome;
     private $email;
     private $mensagem;
     private $celular;

     public function __construct(Request $request)
     {
         $this->nome = $request->nome;
         $this->email = $request->email;
         $this->mensagem = $request->mensagem;
         $this->celular = $request->celular;
     }

     public function sendMail()
     {
         $data = array (
             'nome' => $this->nome,
             'email' => $this->email,
             'mensagem' => $this->mensagem,
             'celular' => $this->celular
         );

         Mail::to( config('mail.from.address'))
             ->send(new SendMail($data));
     }
}
