<?php
function currencyToSystemDefaultBD($curr, $casas=8,$formata=false){
  if( !empty($curr) ){
    $curr = ( is_numeric($curr) ? number_format($curr,8) : $curr );

    $curr = str_replace(',','.',$curr);
    $curr = explode('.',$curr);
    $nova = '';
    foreach( $curr as $key => $data ) {
      if( count($curr)-1 > $key ){
        $nova .= $data;
      }
    }
    $nova .= ','.$curr[$key];
    $curr = $nova;

    $curr = str_replace(' ', '', $curr);
    $curr = str_replace('R$', '', $curr);
    $curr = str_replace(',','.',$curr);
    $curr = @number_format($curr,$casas);
    $curr = str_replace(',', '', $curr);

    if( $formata ){
      return number_format($curr,$casas);
    }
    return $curr;
  }
  return 0;
}