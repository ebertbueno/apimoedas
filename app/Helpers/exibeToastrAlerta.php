<?php
function exibeToastrAlerta($data=''){

  $cor = ( !empty($data['cor']) ? $data['cor'] : 'success' );
  $titulo = ( !empty($data['titulo']) ? $data['titulo'] : 'sucesso' );
  $mensagem = ( !empty($data['mensagem']) ? $data['mensagem'] : 'Tudo certo' );

  return "
  <script>
  window.onload = function() {
    toastr.".$cor."(
    '".trataTraducoes($mensagem)."',
    '".trataTraducoes($titulo)."', {
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
};
  </script>
  ";
}