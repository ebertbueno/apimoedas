<?php
function montaBotoesDatatable($data, $url='', $id=''){
  if( Auth()->check() ){
    $retorno = '';
    foreach( $data as $botoes ){
      if( !empty($botoes['url']) ){
        $botoes['url'] = str_replace('|url|', $url, $botoes['url']);
      }
      if( !empty($id) ){
        $botoes['url'] = str_replace('|id|', $id, $botoes['url']);
      }
      $retorno .= Componentes::MontaBotao($botoes);
    }
    return $retorno;
  }
  return [];
}