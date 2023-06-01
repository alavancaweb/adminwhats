<div class="modal fade" id="cria_conexao{{$registro->id}}" tabindex="-1" role="dialog" aria-labelledby="cria_conexaoLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cria_conexaoLabel"></h5>
                <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="client-container{{$registro->id}}">
                    <div class="client{{$registro->id}}" style="display: none">
                        <img src="{{asset('img/imagem.gif')}}" id="qrcode{{$registro->id}}" width="100%">
                        <br>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal" hidden>Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>
