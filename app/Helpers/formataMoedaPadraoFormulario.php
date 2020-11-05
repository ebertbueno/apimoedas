<?php
function formataMoedaPadraoFormulario($valor,$numberFormat=''){
  $valor = str_replace(',','.',$valor);
  $valor = explode('.', $valor);
  $totalMontado = '';
  foreach( $valor as $key => $remonta ){
    if( $key < count($valor)-1 ){
      $totalMontado = $totalMontado . $remonta;
    } else {
      $totalMontado = $totalMontado .'.'. $remonta;
    }
  }

  if( !empty($numberFormat) ){
    return $totalMontado;
    return number_format($totalMontado,$numberFormat);
  }
  return $totalMontado;
}