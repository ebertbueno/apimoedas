<?php
function trataUrlparaFuncao($url, $form = ''){
  if( !empty($form) ){
    $url = "motorBusca('".url($url)."')";
  } else {
    // $url = "montaTela('".url($url)."')";
    $url = url($url);
  } 
  return $url;
}