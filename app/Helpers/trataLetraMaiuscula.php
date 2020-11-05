<?php
function trataLetraMaiuscula($texto){
  $texto = explode(' ', $texto);
  $novoTexto = '';
  foreach( $texto as $key => $textos ){
    $novoTexto .= ucfirst(strtolower($textos));

    if( $key < (count($texto)-1) ){
      $novoTexto = $novoTexto . ' ';
    }
  }
  return $novoTexto;
}