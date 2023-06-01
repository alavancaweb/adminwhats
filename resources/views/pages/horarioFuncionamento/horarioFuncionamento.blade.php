@extends('layout.master')

@section('content')

<script>
    function limitarCaracteres() {
      var campo = document.getElementById("meuTextarea");
      var limite = 450; // Define o número máximo de caracteres permitidos

      if (campo.value.length > limite) {
        campo.value = campo.value.substring(0, limite); // Trunca o texto para o limite de caracteres
      }

      // Exibe a contagem de caracteres restantes
      var caracteresRestantes = limite - campo.value.length;
      document.getElementById("contador").innerHTML = caracteresRestantes + " Caracteres restantes";
    }
</script>

<script>
    function limitarCaracteressaudacao() {
      var campo = document.getElementById("meuTextareasaudacao");
      var limite = 450; // Define o número máximo de caracteres permitidos

      if (campo.value.length > limite) {
        campo.value = campo.value.substring(0, limite); // Trunca o texto para o limite de caracteres
      }

      // Exibe a contagem de caracteres restantes
      var caracteresRestantes = limite - campo.value.length;
      document.getElementById("contadorsaudacao").innerHTML = caracteresRestantes + " Caracteres restantes";
    }
</script>

@if($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sucesso!</strong>{{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<h4 class="card-title" _msthash="1771757" _msttexthash="77545">Horários de Funcionamento</h4>
<div>
<center>
<h4 style="color: red">Obrigatório o preenchimento de todos os campos</h4>
</center>
</div>
<br>
<div class="container col-md-12">
    <div class="col-md-12 jumbotron mx-auto">
        <form action="{{route('horario.add')}}" method="POST">
            {{ csrf_field() }}

            <div class="row">
                <div class="form-group">
                    <h3>Segunda</h3>
                    @if (isset($segunda[0]->inicio) && !empty($segunda[0]->inicio))
                        <input name="segundaInicio" type="time" required  placeholder="Início" class="form-control" value="{{$segunda[0]->inicio}}">
                        <input name="segundaPausa" type="time" required placeholder="Pausa" class="form-control" value="{{$segunda[0]->pausa}}">
                        <input name="segundaRetorno" type="time" required placeholder="Retorno" class="form-control" value="{{$segunda[0]->retorno}}">
                        <input name="segundaFim" type="time" required placeholder="Fim" class="form-control" value="{{$segunda[0]->fim}}">
                    @else
                        <input name="segundaInicio" type="time" required  placeholder="Início" class="form-control">
                        <input name="segundaPausa" type="time" required placeholder="Pausa" class="form-control">
                        <input name="segundaRetorno" type="time" required placeholder="Retorno" class="form-control">
                        <input name="segundaFim" type="time" required placeholder="Fim" class="form-control">
                    @endif
                </div>
                <div class="form-group">
                    <h3>Terça</h3>
                    @if (isset($terca[0]->inicio) && !empty($terca[0]->inicio))
                        <input name="tercaInicio" type="time" required placeholder="Início" class="form-control" value="{{$terca[0]->inicio}}">
                        <input name="tercaPausa" type="time" required placeholder="Pausa" class="form-control" value="{{$terca[0]->pausa}}">
                        <input name="tercaRetorno" type="time" required placeholder="Retorno" class="form-control" value="{{$terca[0]->retorno}}">
                        <input name="tercaFim" type="time" required placeholder="Fim" class="form-control" value="{{$terca[0]->fim}}">
                    @else
                        <input name="tercaInicio" type="time" required placeholder="Início" class="form-control">
                        <input name="tercaPausa" type="time" required placeholder="Pausa" class="form-control">
                        <input name="tercaRetorno" type="time" required placeholder="Retorno" class="form-control">
                        <input name="tercaFim" type="time" required placeholder="Fim" class="form-control">
                    @endif
                </div>
                <div class="form-group">
                    <h3>Quarta</h3>
                    @if (isset($quarta[0]->inicio) && !empty($quarta[0]->inicio))
                        <input name="quartaInicio" type="time" required placeholder="Início" class="form-control" value="{{$quarta[0]->inicio}}">
                        <input name="quartaPausa" type="time" required placeholder="Pausa" class="form-control" value="{{$quarta[0]->pausa}}">
                        <input name="quartaRetorno" type="time" required placeholder="Retorno" class="form-control" value="{{$quarta[0]->retorno}}">
                        <input name="quartaFim" type="time" required placeholder="Fim" class="form-control" value="{{$quarta[0]->fim}}">
                    @else
                        <input name="quartaInicio" type="time" required placeholder="Início" class="form-control">
                        <input name="quartaPausa" type="time" required placeholder="Pausa" class="form-control">
                        <input name="quartaRetorno" type="time" required placeholder="Retorno" class="form-control">
                        <input name="quartaFim" type="time" required placeholder="Fim" class="form-control">
                    @endif
                </div>
                <div class="form-group">
                    <h3>Quinta</h3>
                    @if (isset($quinta[0]->inicio) && !empty($quinta[0]->inicio))
                        <input name="quintaInicio" type="time" required placeholder="Início" class="form-control" value="{{$quinta[0]->inicio}}">
                        <input name="quintaPausa" type="time" required placeholder="Pausa" class="form-control" value="{{$quinta[0]->pausa}}">
                        <input name="quintaRetorno" type="time" required placeholder="Retorno" class="form-control" value="{{$quinta[0]->retorno}}">
                        <input name="quintaFim" type="time" required placeholder="Fim" class="form-control" value="{{$quinta[0]->fim}}">
                    @else
                        <input name="quintaInicio" type="time" required placeholder="Início" class="form-control">
                        <input name="quintaPausa" type="time" required placeholder="Pausa" class="form-control">
                        <input name="quintaRetorno" type="time" required placeholder="Retorno" class="form-control">
                        <input name="quintaFim" type="time" required placeholder="Fim" class="form-control">
                    @endif
                </div>
                <div class="form-group">
                    <h3>Sexta</h3>
                    @if (isset($sexta[0]->inicio) && !empty($sexta[0]->inicio))
                        <input name="sextaInicio" type="time" required placeholder="Início" class="form-control" value="{{$sexta[0]->inicio}}">
                        <input name="sextaPausa" type="time" required placeholder="Pausa" class="form-control" value="{{$sexta[0]->pausa}}">
                        <input name="sextaRetorno" type="time" required placeholder="Retorno" class="form-control" value="{{$sexta[0]->retorno}}">
                        <input name="sextaFim" type="time" required placeholder="Fim" class="form-control" value="{{$sexta[0]->fim}}">
                    @else
                        <input name="sextaInicio" type="time" required placeholder="Início" class="form-control">
                        <input name="sextaPausa" type="time" required placeholder="Pausa" class="form-control">
                        <input name="sextaRetorno" type="time" required placeholder="Retorno" class="form-control">
                        <input name="sextaFim" type="time" required placeholder="Fim" class="form-control">
                    @endif
                </div>
                <div class="form-group">
                    <h3>Sábado</h3>
                    @if (isset($sabado[0]->inicio) && !empty($sabado[0]->inicio))
                        <input name="sabadoInicio" type="time" required placeholder="Início" class="form-control" value="{{$sabado[0]->inicio}}">
                        <input name="sabadoPausa" type="time" required placeholder="Pausa" class="form-control" value="{{$sabado[0]->pausa}}">
                        <input name="sabadoRetorno" type="time" required placeholder="Retorno" class="form-control" value="{{$sabado[0]->retorno}}">
                        <input name="sabadoFim" type="time" required placeholder="Fim" class="form-control" value="{{$sabado[0]->fim}}">
                    @else
                        <input name="sabadoInicio" type="time" required placeholder="Início" class="form-control">
                        <input name="sabadoPausa" type="time" required placeholder="Pausa" class="form-control">
                        <input name="sabadoRetorno" type="time" required placeholder="Retorno" class="form-control">
                        <input name="sabadoFim" type="time" required placeholder="Fim" class="form-control">
                    @endif
                </div>
                <div class="form-group">
                    <h3>Domingo</h3>
                    @if (isset($domingo[0]->inicio) && !empty($domingo[0]->inicio))
                        <input name="domingoInicio" type="time" required placeholder="Início" class="form-control" value="{{$domingo[0]->inicio}}">
                        <input name="domingoPausa" type="time" required placeholder="Pausa" class="form-control" value="{{$domingo[0]->pausa}}">
                        <input name="domingoRetorno" type="time" required placeholder="Retorno" class="form-control" value="{{$domingo[0]->retorno}}">
                        <input name="domingoFim" type="time" required placeholder="Fim" class="form-control" value="{{$domingo[0]->fim}}">
                    @else
                        <input name="domingoInicio" type="time" required placeholder="Início" class="form-control">
                        <input name="domingoPausa" type="time" required placeholder="Pausa" class="form-control">
                        <input name="domingoRetorno" type="time" required placeholder="Retorno" class="form-control">
                        <input name="domingoFim" type="time" required placeholder="Fim" class="form-control">
                    @endif
                </div>
            </div>
            <center>
                <br>
                @if (isset($ausencia[0]->ausencia) && !empty($ausencia[0]->ausencia))
                    <div class="form-group">
                        <label for="resposta">Mensagem de Ausência</label>
                        <textarea name="ausencia" id="meuTextarea" autocomplete="off" required placeholder="Digite sua Mensagem de Ausência" class="form-control" rows="5" cols="1" class="form-control" oninput="limitarCaracteres()">{{$ausencia[0]->ausencia}}</textarea>
                        <p id="contador">{{$quantidade}} Caracteres restantes</p>
                    </div>
                @else
                    <div class="form-group">
                        <label for="resposta">Mensagem de Ausência</label>
                        <textarea name="ausencia" id="meuTextarea" autocomplete="off" required placeholder="Digite sua Mensagem de Ausência" class="form-control" rows="5" cols="1" class="form-control" oninput="limitarCaracteres()"></textarea>
                        <p id="contador">{{$quantidade}} Caracteres restantes</p>
                    </div>
                @endif
                <br><br>
                @if (isset($saudacao[0]->saudacao) && !empty($saudacao[0]->saudacao))
                    <div class="form-group">
                        <label for="resposta">Mensagem de Saudação</label>
                        <textarea name="saudacao" id="meuTextareasaudacao" autocomplete="off" required placeholder="Digite sua Mensagem de Saudação" class="form-control" rows="5" cols="1" class="form-control" oninput="limitarCaracteressaudacao()">{{$saudacao[0]->saudacao}}</textarea>
                        <p id="contadorsaudacao">{{$quantidadeSaudacao}} Caracteres restantes</p>
                    </div>
                @else
                    <div class="form-group">
                        <label for="resposta">Mensagem de Saudação</label>
                        <textarea name="saudacao" id="meuTextareasaudacao" autocomplete="off" required placeholder="Digite sua Mensagem de Saudação" class="form-control" rows="5" cols="1" class="form-control" oninput="limitarCaracteressaudacao()"></textarea>
                        <p id="contadorsaudacao">{{$quantidadeSaudacao}} Caracteres restantes</p>
                    </div>
                @endif
                @if (isset($saudacao[0]->periodicidade) && !empty($saudacao[0]->periodicidade))
                    <div class="form-group col-md-3">
                        <label for="periodicidade">Periodicidade Saudação</label>
                        <input name="periodicidade" type="text" required placeholder="Periodicidade" class="form-control" value="{{$saudacao[0]->periodicidade}}">
                    </div>
                @else
                    <div class="form-group col-md-3">
                        <label for="periodicidade">Periodicidade Saudação</label>
                        <input name="periodicidade" type="text" required placeholder="Periodicidade" class="form-control">
                    </div>
                @endif


                <div class="form-group">
                    <button class="btn btn-success" type="submit">Salvar</button>
                </div>
            </center>
        </form>
    </div>
</div>
@endsection
