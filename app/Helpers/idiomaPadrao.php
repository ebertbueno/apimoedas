<?php
function idiomaPadrao($tipo='idioma'){
  $idioma = strtolower(( !empty($_SESSION['dadosUsuarioCompleto']['idioma']) ? $_SESSION['dadosUsuarioCompleto']['idioma'] : 'pt-br' ));

  if( Auth()->check() )  {
    $idiomaPadrao = dadosUsuarioCompleto()['idioma'];
    $idioma = ( isset($idiomaPadrao) ? $idiomaPadrao : $idioma );
  }

  $_SESSION['dadosUsuarioCompleto']['idioma'] = $idioma;

  switch ($tipo) {
    case 'data':
    $consulta = Model('Idiomas')::where('sigla', strtolower($idioma))->count();
    $retorno = ( !empty($consulta['formato_data']) ? $consulta['formato_data'] : 'd/m/Y' );
    break;

    default:
    $retorno = $idioma;
    break;
  }

  return $retorno;
}