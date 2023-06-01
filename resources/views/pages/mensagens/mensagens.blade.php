@extends('layout.master')

@section('content')

@if($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Operação não Autorizada!</strong> {{session('error')}}
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
    <h4 class="card-title" _msthash="1771757" _msttexthash="77545">Mensagens Automáticas</h4>
    <br>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nova_mensagem">Nova Mensagem</button>
    <br><br>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th _msthash="3901040" _msttexthash="139581"> Status </th>
                    <th _msthash="3901040" _msttexthash="139581"> Pergunta </th>
                    <th _msthash="3901170" _msttexthash="153218"> Resposta </th>
                    <th _msthash="3900910" _msttexthash="208377"> Editar | Excluir </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mensagens as $registro)
                    <tr>
                        <td class="font-weight-medium" _msthash="3901040" _msttexthash="139581">{{ substr($registro->status, 0, 20) }}
                            <input value="{{$registro->status}}" hidden type="text" id="{{$registro->id}}">
                        </td>

                        <td class="font-weight-medium departamento" _msthash="3901170" _msttexthash="153218">{{ substr($registro->pergunta, 0, 30) }}
                            <input value="{{$registro->pergunta}}" hidden type="text" id="{{$registro->id}}">
                        </td>

                        <td class="font-weight-medium departamento" _msthash="3901170" _msttexthash="153218">{{ substr($registro->resposta, 0, 30) }}
                            <input value="{{$registro->resposta}}" hidden type="text" id="{{$registro->id}}">
                        </td>

                        <td class="align-middle text-end">
                            <div class="editar-eliminar">
                                <button type="button" class="btn btn-inverse-dark btn-sm ml-2" _msthash="3900910" _msttexthash="208377" data-toggle="modal" data-target="#editar_mensagem{{$registro->id}}">Editar</button>
                                <button type="button" class="btn btn-inverse-danger btn-sm ml-2" _msthash="3900910" _msttexthash="208377" data-toggle="modal" data-target="#excluir_mensagem{{$registro->id}}">Excluir</button>
                            </div>
                                @include('pages.mensagens._modalEditar')
                                @include('pages.mensagens._modalEliminar')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('pages.mensagens._modalAdd')

@endsection
