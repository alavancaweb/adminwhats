<?php

namespace App\Http\Controllers;

use App\Models\mensagens;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MensController extends Controller
{
    public function index(){

        $mensagens = DB::table('mensagens')->where('cod_estabel', '=', Auth::user()->cod_estabel)->get();

        return view("pages.mensagens.mensagens", compact('mensagens'));
    }

    public function adicionar(Request $request){

        $status = "";

        if($request->status == true){

            $status = "Ativo";
        }else{
            $status = "Inativo";
        }

        $dados = array(
            'pergunta' => $request->pergunta,
            'resposta' => $request->resposta,
            'status'  =>  $status,
            'cod_estabel' => Auth::user()->cod_estabel
        );

        mensagens::create($dados);

        return redirect()->back()->with('success', 'Mensagem criada com Sucesso!');
    }

    public function deletar($id){

        $mensagem = mensagens::find($id);

        $mensagem->delete();

        return redirect()->back()->with('success', 'Mensagem excluida com Sucesso!');

    }

    public function editar(Request $request, $id){

        $status = "";

        if($request->status == true){
            $status = "Ativo";
        }else{
            $status = "Inativo";
        }

        $mensagem = mensagens::find($id);

        $dados = array(
            'pergunta' => $request->pergunta,
            'resposta' => $request->resposta,
            'status'  =>  $status,
            'cod_estabel' => Auth::user()->cod_estabel
        );

        $mensagem->update($dados);

        return redirect()->back()->with('success', 'Mensagem editada com Sucesso!');

    }
}
