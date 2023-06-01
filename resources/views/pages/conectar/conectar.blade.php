@extends('layout.master')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>

@if($message = Session::get('mensagem'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Operação não Autorizada!</strong> {{session('mensagem')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if($success = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sucesso!</strong> {{session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card-body">
    <h4 class="card-title" _msthash="1771757" _msttexthash="77545">Conectar WhatsApp</h4>
    <br>
    <button type="button" class="btn btn-success" @if($total_conexoes > 1) disabled @endif  @if($total_conexoes < 1)  data-toggle="modal" data-target="#nova_conexao"@endif>Nova Conexão</button>
    {{-- <span @if($total_conexoes < 1) hidden @endif class="text-danger" >Você atingiu o limite de conexões</span> --}}
    <br><br>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th _msthash="3901040" _msttexthash="139581"> Nome </th>
                    <th _msthash="3901170" _msttexthash="153218"> Departamento </th>
                    <th _msthash="3900910" _msttexthash="208377"> Conectar-se</th>
                    <th _msthash="3900910" _msttexthash="208377"> Editar | Excluir </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registros as $registro)
                    <tr>
                        <td class="font-weight-medium" _msthash="3901040" _msttexthash="139581">{{$registro->nome}}
                            <input value="{{$registro->nome}}" hidden type="text" id="client-id{{$registro->id}}">
                        </td>

                        <td class="font-weight-medium departamento" _msthash="3901170" _msttexthash="153218">{{$registro->departamento}}
                            <input value="{{$registro->departamento}}" hidden type="text" id="client-token{{$registro->id}}">
                        </td>

                        <td>
                            <div class="check">
                                <button class="btn add-client-btn{{$registro->id}}" type="button" data-toggle="modal" id="button-img{{$registro->id}}" data-target="#cria_conexao{{$registro->id}}" value="{{$registro->nome}}">
                                    <img src="{{ asset('assets/images/faces/qrcode.jpg')}}" id="img{{$registro->id}}"/>
                                </button>
                            </div>
                        </td>
                        @include('pages.conectar._modalConectar')

                        <td class="align-middle text-end">
                            <div class="editar-eliminar">
                                <button type="button" class="btn btn-inverse-dark btn-sm ml-2" _msthash="3900910" _msttexthash="208377" id="editar{{$registro->id}}" data-toggle="modal" data-target="#editar_conexao{{$registro->id}}">Editar</button>
                                <button type="button" class="btn btn-inverse-danger btn-sm ml-2" _msthash="3900910" _msttexthash="208377" id="eliminar{{$registro->id}}" data-toggle="modal" data-target="#excluir_conexao{{$registro->id}}">Excluir</button>
                            </div>
                                @include('pages.conectar._modalEditar')
                                @include('pages.conectar._modalEliminar')
                        </td>
                    </tr>
                    <script>

                        //Inicia Logica Utilizando Jquery
                        $(document).ready(function() {

                            //Variaveis Globais Jqury
                            var socket = io('http://localhost:8005');
                            //var socket = io('http://185.188.249.15:8007'); //Conecta com API externa
                            var check = 'img/check.svg';              //Salva imagem de check
                            var index_nome = -0;                      //Salva valor da posição do array que o nome está

                            //Evento quando clica no botão para conectar
                            $('.add-client-btn{{$registro->id}}').click(function() {
                                $(`.client{{$registro->id}} #qrcode{{$registro->id}}`).attr('src', 'img/imagem.gif');

                                //Variaveis do evento .add-client-btn
                                var clientId = $('#client-id{{$registro->id}}').val();
                                var clientToken = $('#client-token{{$registro->id}}').val();
                                var clientClass = 'client-' + clientId;

                                //Clona template atual, alterando para gif de carregando(Está sendo tratado dentro do _modalConectar)
                                var template = $('.client{{$registro->id}}').first().remove().clone()
                                                        .attr('style', 'display: flex')
                                                        .addClass(clientClass);
                                 $('.client-container{{$registro->id}}').append(template);

                                //Envia para API nome e dapartamento da conexão(estes dados ficam salvos em um array dentro da api)
                                socket.emit('create-session', {
                                    id: clientId,
                                    token: clientToken,
                                    ativo: 0
                                });
                            });


                            //Recebe nome e departamento da conexão toda vez que a tela é atualizada
                            socket.on('init', function(data) {

                                //Contador para pegar as posições de cada conexão conectada no array da API
                                // for (var i = 0; i < data.length; i++) {

                                //     //Variaveis do contador FOR
                                //     var session = data[i];              //Salva todos os dados de cada posição do array
                                //     var clientId = session.id;          //Salva apenas o nome
                                //     var ativo = session.ativo;

                                     //Evento para percorrer cada imagem da tela e comparando o index do array de imagens com o index do array de nomes, altera a imagem do botão para check
                                    // if(clientId == '{{$registro->nome}}' && ativo == 1 ){

                                    if(data[0].ativo == 1 ){

                                        console.log($('.check #img{{$registro->id}}'));

                                        $('.check #img{{$registro->id}}').attr('src', 'img/check.svg');
                                        $('.check #button-img{{$registro->id}}').prop('disabled', true);
                                        $('.editar-eliminar #editar{{$registro->id}}').prop('disabled', true);
                                        $('.editar-eliminar #eliminar{{$registro->id}}').prop('disabled', true);
                                    };
                                // }
                            });

                            socket.on('qr', function(data) {

                            //Variaveis evento qrcode
                            var index_nome = -0;        //Salva a posição que o index está no array, inicia com -0 para não dar erro

                            //Altera imagem do gif carregando para imagem do qrcode vinda da API
                            $(`.client{{$registro->id}} #qrcode{{$registro->id}}`).attr('src', data.src);
                            $(`.client{{$registro->id}} #qrcode{{$registro->id}}`).show();

                            //se a imagem vinda da API for check quer dizer que está conexão já está conectada, então faz a alteração da imagem para check
                            if(data.src == "img/check.svg"){

                                //Evento para percorrer cada imagem da tela e comparando o index do array de imagens com o index do array de nomes, altera a imagem do botão para check
                                // if(data.id == '{{$registro->nome}}'){

                                    $(`.check #img{{$registro->id}}`).attr('src', 'img/check.svg');
                                    $('.check #button-img{{$registro->id}}').prop('disabled', true);
                                    $('.editar-eliminar #editar{{$registro->id}}').prop('disabled', true);
                                    $('.editar-eliminar #eliminar{{$registro->id}}').prop('disabled', true);
                                // };

                                //Inicia Delay de 1 segundo para alterar imagem do qrcode para check
                                let i = 0

                                const timer = setInterval(function() {
                                if (i >= 1) {
                                    clearInterval(timer) //aborta a execução caso a condição seja atingida
                                }

                                i++
                                    //Fecha o modal quando o tempo de 1 segundo seja atendido
                                    $('#cria_conexao{{$registro->id}}').modal('hide');
                                }, 2000)
                            }
                            });

                            //Ainda não sei muito bem o que essa função está fazendo na API
                            socket.on('remove-session', function(id) {

                                // if(id == '{{$registro->nome}}'){

                                    $(`.check #img{{$registro->id}}`).attr('src', 'assets/images/faces/qrcode.jpg');
                                    $('.check #button-img{{$registro->id}}').prop('disabled', false);
                                    $('.editar-eliminar #editar{{$registro->id}}').prop('disabled', false);
                                    $('.editar-eliminar #eliminar{{$registro->id}}').prop('disabled', false);
                                // };
                            });

                            //Retorna mensagem vinda da API no momento não está retornada nada, mais futuramente poderemos utilizar
                            socket.on('message', function(data) {

                            });

                            //Ainda não sei muito bem o que essa função está fazendo na API
                            socket.on('message-group', function(data) {
                            });

                            //Recebe informações de conectado da API mais ainda não está sendo utilizado
                            socket.on('ready', function(data) {
                            });

                            //Recebe informações de authenticado da API mais ainda não está sendo utilizado
                            socket.on('authenticated', function(data) {
                            });


                        }); //Finaliza Logica Jquery

                    </script>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('pages.conectar._modalAdd')

@endsection
