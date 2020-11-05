<?php
function consultaAlertasExistentes($tipo='',$soma=false){

  if( $soma ){
    if( !empty($tipo) ){
      $consulta = Model('Alertas')::where('users_id_to', Auth()->user()->id)->count();
    } else {
      $consulta = Model('Alertas')::where('users_id_to', Auth()->user()->id)->where('alertas_tipo_id', $tipo)->count();
    }
  } else {
    if( !empty($tipo) ){
      $consulta = Model('Alertas')::where('users_id_to', Auth()->user()->id)->get();
    } else {
      $consulta = Model('Alertas')::where('users_id_to', Auth()->user()->id)->where('alertas_tipo_id', $tipo)->get();
    }
  }

  return $consulta;
}