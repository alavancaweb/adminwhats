<div class="modal fade" id="nova_mensagem" tabindex="-1" role="dialog" aria-labelledby="nova_mensagemLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nova_mensagemLabel">Nova Mensagem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('mensagens.add')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="col-md-12" >
                        <div class="form-group">
                            <label for="pergunta">Pergunta</label>
                            <textarea name="pergunta" autocomplete="off" required placeholder="Pergunta" class="form-control" rows="7" cols="40" ></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="resposta">Resposta</label>
                            <textarea name="resposta" autocomplete="off" required placeholder="Resposta" class="form-control" rows="7" cols="40"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12" >
                        <div class="form-check">
                            <input class="form-group" type="checkbox" value="true" id="defaultCheck1" name="status" checked>
                            <label class="form-group" for="defaultCheck1" _msthash="1496846" _msttexthash="550082"> Status</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
