<?php
function pegaIdiomasDisponiveis(){
  $retorno = Model('Idiomas')::get();
  $retorno = ( !empty($retorno) ? $retorno : 1 );

  $saida = [];
  foreach( $retorno as $data){
    $saida[] = [
      'titulo' => trataTraducoes($data['nome']),
      'sigla' => $data['sigla'],
      'imagem' => $data['bandeira'],
      'url' => $data['sigla'],
    ];
  }
  return $saida;
}