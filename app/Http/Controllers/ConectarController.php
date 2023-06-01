<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\conexoes;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Auth;

class ConectarController extends Controller
{
    //Função retorna todas as conexões criadas no banco
    public function index(){

        $users = DB::table('users')->where('cod_estabel', '=', Auth::user()->cod_estabel)->get();

	    if($users[0]->cod_estabel == "1"){

		    $registros = DB::table('conexoes')->where('cod_estabel', '=', Auth::user()->cod_estabel)->get();

        	$total_conexoes = count($registros);

            return view("pages.conectar.conectar",compact('registros','total_conexoes'));
        }else{
            return redirect('/login');
        }

    }

    //Criação de conexão
    Public function adicionar(Request $request){

        $dados = $request->all();

        $dados =  array(
            'nome' => $request->nome,
            'departamento' => $request->departamento,
            'cod_estabel' => Auth::user()->cod_estabel,
        );

        conexoes::create($dados);

        return redirect()->back()->with('success', 'Conexão criada com sucesso!');
    }

    //Edição dos Fretes
    public function editar(Request $request, $id){

        $dados =  array(
            'nome' => $request->nome,
            'departamento' => $request->departamento,
            'cod_estabel' => Auth::user()->cod_estabel,
        );

        $conectar = conexoes::find($id);

        $conectar->update($dados);

        return redirect()->back()->with('success', 'Conexão Alterada com sucesso!');
    }

    //Deletar Conexao
    public function deletar($id){

        $conexao = conexoes::find($id);

        $conexao->delete();

        return redirect()->back()->with('success', 'Conexão Excluida com Sucesso!');
    }
}
