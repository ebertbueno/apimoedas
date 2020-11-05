<?php
function ultimosIndicados(){
  if( Auth()->check() ){
    $retorno = Model('UserArvoreIndicados')::where('root',Auth()->user()->id)->get();

    $saida = [];
    foreach($retorno as $data){
      $saida[] = [
        'data_hora' => $data['created_at'],
        'nome' => $data['name'],
        'email' => $data['email'],
      ];
    }
    return $saida;
  }
}