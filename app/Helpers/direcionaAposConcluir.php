<?php
function direcionaAposConcluir($data=''){
  $url = ( is_array($data) ? $data['url'] : $data );
  $cor = ( !empty($data['cor']) ? $data['cor'] : 'success' );
  $titulo = trataTraducoes( !empty($data['titulo']) ? $data['titulo'] : 'Tudo certo' );
  $mensagem = trataTraducoes( !empty($data['mensagem']) ? $data['mensagem'] : 'Operação realizada com sucesso' );
  $target = ( !empty($data['target']) ? $data['target'] : Null );

  $mensagem = trataTraducoes($mensagem);
  $titulo = trataTraducoes($titulo);
  if( !is_null($target) ){
    echo '<meta http-equiv="refresh" content="1; URL=/"/>';
  }

  return "
  <script>
  toastr.".$cor."(
  '".$mensagem."',
  '".$titulo."', {
    timeOut: 2000,
    showEasing: 'linear',
    showMethod: 'slideDown',
    closeMethod: 'fadeOut',
    closeDuration: 300,
    closeEasing: 'swing',
    closeButton: false,
    progressBar: true,
  }
  );
  </script>
  ";
}