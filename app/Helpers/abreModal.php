<?php
function abreModal($data=''){

  $chaveModal = rand(1,100000);
  $alinhamento = ( !empty($data['alinhamento']) ? $data['alinhamento'] : 'float-right' );
  $icone = ( !empty($data['icone']) ? $data['icone'] : 'fa fa-edit' );
  $url = ( !empty($data['url']) ? $data['url'] : '/settings/my_profile' );
  $botaoEnviarLabel = ( !empty($data['botaoEnviarLabel']) ? $data['botaoEnviarLabel'] : 'atualizar' );
  $botaoCancelar = ( !empty($data['botaoCancelar']) ? $data['botaoCancelar'] : 'cancelar' );

  $retorno = '<small class="'.$alinhamento.'"><a data-toggle="modal" data-target="#myModal'.$chaveModal.'"><i class="'.$icone.'"></i></a></small>
  <div class="modal inmodal" id="myModal'.$chaveModal.'" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
  <form name="formulario" id="formulario" action="'.$url.'" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar1.disabled=true, this.botaoEnviar.innerHTML='.trataTraducoes(''.$botaoEnviarLabel.'').'">
  @csrf
  <div class="modal-content animated fadeIn">
  <div class="modal-body">
  <p>conteudo</p>
  </div>
  <div class="modal-footer">
  <div class="col-sm-4"><button type="button" class="btn btn-white btn-block" data-dismiss="modal">'.trataTraducoes(''.$botaoCancelar.'').'</button></div>
  <div class="col-sm-8">teste
  </div>
  </div>
  </div>
  </form>
  </div>
  </div>
  ';

  return $retorno;
}