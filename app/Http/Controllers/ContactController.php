<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;
use App\Models\chamados;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('pages.suporte.suporte');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conexoes = DB::table('conexoes')->where('cod_estabel', '=', Auth::user()->cod_estabel)->get();

        $curl = curl_init();

        $dados = $request->all();

        $dados =  array(
            'nome' => $request->nome,
            'email' => $request->email,
            'descricao' => $request->mensagem,
            'celular' => $request->celular,
            'cod_estabel' => Auth::user()->cod_estabel
        );

        $id_chamado = chamados::create($dados)->id;

        $data = $request->session()->all();

        $url = [];
        $url = 'http://185.188.249.15:8007/chamado';

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => [
                'sender' => $conexoes[0]->nome,
                'token' => $conexoes[0]->departamento,
                'user' => '5516993725328', //Aqui ficará o numero do nosso suporte Alavanca Web, onde a mensagem do cliente será enviada para nós
                'message' => 'Novo Chamado # '. $id_chamado. '  Nome Solicitante: '.$request->nome. ' Contato: '. $request->celular. '  Mensagem: '. $request->mensagem
            ]
        ]);
            // Envio e armazenamento da resposta
            $response = curl_exec($curl);

            // Fecha e limpa recursos
            curl_close($curl);

        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'mensagem' => 'required',
            'celular' => 'required'
        ]);

        $contato = new ContactForm($request);

        try{
            $contato->sendMail();

            return back()
             ->with('success',  '  O número do seu ticket é:  #' .$id_chamado. '   Em breve um de nossos consultores entrará em contato. Obrigado!');
        }catch (\Exception $error){
            return back()->with("error", "Ocorreu um erro inesperado: {$error->getMessage()}");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
