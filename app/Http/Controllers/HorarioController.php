<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ausencias;
use App\Models\saudacoes;
use App\Models\segundas;
use App\Models\tercas;
use App\Models\quartas;
use App\Models\quintas;
use App\Models\sextas;
use App\Models\sabados;
use App\Models\domingos;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HorarioController extends Controller
{
    //
    public function index(){

        $segunda = DB::table('segundas')->where('cod_estabel', '=', Auth::user()->cod_estabel)->get();
        $terca = DB::table('tercas')->where('cod_estabel', '=', Auth::user()->cod_estabel)->get();
        $quarta = DB::table('quartas')->where('cod_estabel', '=', Auth::user()->cod_estabel)->get();
        $quinta = DB::table('quintas')->where('cod_estabel', '=', Auth::user()->cod_estabel)->get();
        $sexta = DB::table('sextas')->where('cod_estabel', '=', Auth::user()->cod_estabel)->get();
        $sabado = DB::table('sabados')->where('cod_estabel', '=', Auth::user()->cod_estabel)->get();
        $domingo = DB::table('domingos')->where('cod_estabel', '=', Auth::user()->cod_estabel)->get();
        $ausencia = DB::table('ausencias')->where('cod_estabel', '=', Auth::user()->cod_estabel)->get();
        $saudacao = DB::table('saudacoes')->where('cod_estabel', '=', Auth::user()->cod_estabel)->get();

        if($ausencia->isEmpty()){
            $quantidade = 450;
        }else{
            $quantidade = (450 - strlen($ausencia[0]->ausencia));
        }

        if($saudacao->isEmpty()){
            $quantidadeSaudacao = 450;
        }else{
            $quantidadeSaudacao = (450 - strlen($saudacao[0]->saudacao));
        }

        return view("pages.horarioFuncionamento.horarioFuncionamento", compact('segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'domingo', 'ausencia', 'saudacao', 'quantidade', 'quantidadeSaudacao'));
    }

    public function adicionar(request $request){

        $dadosSegunda = DB::table('segundas')->where('cod_estabel', '=', Auth::user()->cod_estabel)->get();

        $segunda =  array(
            'inicio' => $request->segundaInicio,
            'pausa' => $request->segundaPausa,
            'retorno' => $request->segundaRetorno,
            'fim' => $request->segundaFim,
            'cod_estabel' => Auth::user()->cod_estabel,
        );

        $terca =  array(
            'inicio' => $request->tercaInicio,
            'pausa' => $request->tercaPausa,
            'retorno' => $request->tercaRetorno,
            'fim' => $request->tercaFim,
            'cod_estabel' => Auth::user()->cod_estabel,
        );

        $quarta =  array(
            'inicio' => $request->quartaInicio,
            'pausa' => $request->quartaPausa,
            'retorno' => $request->quartaRetorno,
            'fim' => $request->quartaFim,
            'cod_estabel' => Auth::user()->cod_estabel,
        );

        $quinta =  array(
            'inicio' => $request->quintaInicio,
            'pausa' => $request->quintaPausa,
            'retorno' => $request->quintaRetorno,
            'fim' => $request->quintaFim,
            'cod_estabel' => Auth::user()->cod_estabel,
        );

        $sexta =  array(
            'inicio' => $request->sextaInicio,
            'pausa' => $request->sextaPausa,
            'retorno' => $request->sextaRetorno,
            'fim' => $request->sextaFim,
            'cod_estabel' => Auth::user()->cod_estabel,
        );

        $sabado =  array(
            'inicio' => $request->sabadoInicio,
            'pausa' => $request->sabadoPausa,
            'retorno' => $request->sabadoRetorno,
            'fim' => $request->sabadoFim,
            'cod_estabel' => Auth::user()->cod_estabel,
        );

        $domingo =  array(
            'inicio' => $request->domingoInicio,
            'pausa' => $request->domingoPausa,
            'retorno' => $request->domingoRetorno,
            'fim' => $request->domingoFim,
            'cod_estabel' => Auth::user()->cod_estabel,
        );

        $ausencia =  array(
            'ausencia' => $request->ausencia,
            'cod_estabel' => Auth::user()->cod_estabel,
        );

        $saudacao =  array(
            'saudacao' => $request->saudacao,
            'periodicidade' => $request->periodicidade,
            'cod_estabel' => Auth::user()->cod_estabel,
        );

        if($dadosSegunda->isEmpty()){
            segundas::create($segunda);
            tercas::create($terca);
            quartas::create($quarta);
            quintas::create($quinta);
            sextas::create($sexta);
            sabados::create($sabado);
            domingos::create($domingo);
            ausencias::create($ausencia);
            saudacoes::create($saudacao);
        }else{
            segundas::query()->update(['inicio' => $request->segundaInicio, 'pausa' => $request->segundaPausa, 'retorno' => $request->segundaRetorno, 'fim' => $request->segundaFim]);
            tercas::query()->update(['inicio' => $request->tercaInicio, 'pausa' => $request->tercaPausa, 'retorno' => $request->tercaRetorno, 'fim' => $request->tercaFim]);
            quartas::query()->update(['inicio' => $request->quartaInicio, 'pausa' => $request->quartaPausa, 'retorno' => $request->quartaRetorno, 'fim' => $request->quartaFim]);
            quintas::query()->update(['inicio' => $request->quintaInicio, 'pausa' => $request->quintaPausa, 'retorno' => $request->quintaRetorno, 'fim' => $request->quintaFim]);
            sextas::query()->update(['inicio' => $request->sextaInicio, 'pausa' => $request->sextaPausa, 'retorno' => $request->sextaRetorno, 'fim' => $request->sextaFim]);
            sabados::query()->update(['inicio' => $request->sabadoInicio, 'pausa' => $request->sabadoPausa, 'retorno' => $request->sabadoRetorno, 'fim' => $request->sabadoFim]);
            domingos::query()->update(['inicio' => $request->domingoInicio, 'pausa' => $request->domingoPausa, 'retorno' => $request->domingoRetorno, 'fim' => $request->domingoFim]);
            ausencias::query()->update(['ausencia' => $request->ausencia]);
            saudacoes::query()->update(['saudacao' => $request->saudacao, 'periodicidade' => $request->periodicidade]);
        }

        return redirect()->back()->with('success', 'Horários salvos com sucesso!');
    }
}
