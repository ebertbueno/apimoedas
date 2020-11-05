<?php
function limitaCaracteres($texto,$limite,$quebra=false){
  $tamanho = strlen($texto);
  if($tamanho <= $limite){
    $novo_texto = $texto;
  }else{
    if($quebra == true){
      $novo_texto = trim(substr($texto, 0, $limite))."...";
    }else{
      $ultimo_espaco = strrpos(substr($texto, 0, $limite), " ");
      $novo_texto = trim(substr($texto, 0, $ultimo_espaco))."...";
    }
  }
  return $novo_texto;
}