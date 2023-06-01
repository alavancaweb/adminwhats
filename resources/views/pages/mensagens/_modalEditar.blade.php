<div class="modal fade" id="editar_mensagem{{$registro->id}}" tabindex="-1" role="dialog" aria-labelledby="editar_mensagemLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editar_mensagemLabel">Editar Mensagem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('mensagens.editar',$registro->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="col-md-12" >
                        <div class="form-group">
                            <label for="pergunta">Pergunta</label>
                            <textarea name="pergunta" required placeholder="Pergunta" class="form-control" rows="7" cols="40">{{ isset($registro->pergunta)? $registro->pergunta: ''}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="resposta">Resposta</label>
                            <textarea name="resposta" id="textoRespostaEdite" required placeholder="Resposta" class="form-control" rows="7" cols="40">{{ isset($registro->resposta)? $registro->resposta : ''}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12" >
                        <div class="form-check">
                            @if ($registro->status == "Ativo")
                                <input class="form-group" type="checkbox" id="defaultCheck1" name="status" value="{{isset($registro->status)? $registro->status : ''}}" checked>
                                <label class="form-group" for="defaultCheck1" _msthash="1496846" _msttexthash="550082"> Status</label>
                            @else
                                <input class="form-group" type="checkbox" id="defaultCheck1" name="status" value="{{isset($registro->status)? $registro->status : ''}}">
                                <label class="form-group" for="defaultCheck1" _msthash="1496846" _msttexthash="550082"> Status</label>
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary" value="Salvar">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
