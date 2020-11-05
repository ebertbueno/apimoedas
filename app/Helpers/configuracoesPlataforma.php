<?php
function configuracoesPlataforma(){
  $saida = [];
  $retorno = Model('Configuracoes')::get();
  $retorno->makeVisible(['chave','valor','tipo','campo_form','mascara'])->toArray();
  foreach( $retorno as $data){
    $saida[$data['chave']] = $data['valor'];
  }

  return $saida;
}