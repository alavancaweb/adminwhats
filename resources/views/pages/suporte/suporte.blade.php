@extends('layout.master')

@section('content')

{{-- @livewireStyles --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>

<!---JQUERY MASK - MASCARA DE VALIDAÇÃO---->
<script>
    $(document).ready(function ($) {
        $('.money2').mask("9999999999999", {reverse: true});
    });
</script>

<script>
    function limitarCaracteres() {
      var campo = document.getElementById("meuTextarea");
      var limite = 250; // Define o número máximo de caracteres permitidos

      if (campo.value.length > limite) {
        campo.value = campo.value.substring(0, limite); // Trunca o texto para o limite de caracteres
      }

      // Exibe a contagem de caracteres restantes
      var caracteresRestantes = limite - campo.value.length;
      document.getElementById("contador").innerHTML = caracteresRestantes + " Caracteres restantes";
    }
</script>

<div>
<h4>Suporte ao Cliente</h4>
</div>
<br>
<div class="container">
    <div class="row">

        <div class="col-md-6 jumbotron mx-auto">
            <form action="{{ url('/suporte') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <h3>Abrir chamado</h3>
                    <p>Preencha os dados abaixo e Informe sua necessidade, para que possamos lhe ajudar!</p>
                </div>

                @if($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Chamado recebido!</strong>{{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input name="nome" type="text" required placeholder="Nome" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input name="email" type="email" required placeholder="E-mail" class="form-control">
                </div>

                <div class="form-group">
                    <label for="celular">Celular</label>
                    <input name="celular" type="text" required placeholder="Exemplo: 5516999999999" class="form-control money2">
                </div>

                <div class="form-group">
                    <label for="mensagem">Mensagem</label>
                    <textarea name="mensagem" required placeholder="Digite sua mensagem" id="meuTextarea" class="form-control" cols="10" rows="5" oninput="limitarCaracteres()"></textarea>
                    <p id="contador">250 Caracteres restantes</p>
                </div>
                <br>

                <button class="btn btn-primary" type="submit">Enviar</button>

            </form>
        </div>
    </div>
</div>
@endsection
