<?php
function formataDataCompleta($string,$campo=''){

  if( !is_null($string) ){
    $array = explode(' ',$string);
    $hora = $array[1];
    $data = $array[0];

    $data_separada = explode('-',$data);

    switch ($campo) {
      case 'data_hora':
      $data_completa = $data_separada[2].'/'.$data_separada[1].'/'.$data_separada[0].' '.$hora;
      break;

      case 'horaSemSegundos':
      $data_completa = explode(':',$hora)[0] . ':' . explode(':',$hora)[1];
      break;

      case 'hora':
      $data_completa = $hora;
      break;

      default:
      $data_completa = $data_separada[2].'/'.$data_separada[1].'/'.$data_separada[0];
      break;
    }
  } else {
    $data_completa = '';
  }

  return $data_completa;
}