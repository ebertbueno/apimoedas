<?php
function dadosUsuarioCompleto($id=''){
  if( Auth()->check() ){
    $id = ( !empty($id) ? $id : Auth()->user()->id );
    $consulta = ( !empty($_SESSION['dadosUsuarioCompleto']) ? $_SESSION['dadosUsuarioCompleto'] : [] );

    if( Auth()->check() ){
      $consulta = Model('Users')::with('UsersDados','UsersEnderecos','UsersTelefone','UsersDocumentos')->find($id);
      $_SESSION['dadosUsuarioCompleto'] = $consulta;
    }
    $_SESSION['dadosUsuarioCompleto']['idioma'] = ( !empty($_SESSION['dadosUsuarioCompleto']['idioma']) ? $_SESSION['dadosUsuarioCompleto']['idioma'] : 'pt-br');
    return $_SESSION['dadosUsuarioCompleto'];
  }
  return;
}