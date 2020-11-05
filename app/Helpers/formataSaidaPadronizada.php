<?php
function formataSaidaPadronizada($mascara,$valor){
  if( empty($valor) ){
    dd('Campo de entrada ausente - Functions.php');
  }

  $mascara = Model('Mascaras')::where('chave',$mascara)->first()['mascara'];

  if( !empty($mascara) ){
    dd('máscara não encontrada');
  }

  $tamanho = count(explode('#',$mascara))-1;
  $valor = str_replace(" ","",$valor);

  if( strlen($valor) > $tamanho ){
    dd('campo diferente da mascara');
  } else {

    for($i=0;$i<strlen($valor);$i++){
      $mascara[strpos($mascara,"#")] = $valor[$i];
    }
  }

  return $mascara;
}