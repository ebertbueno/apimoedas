<?php
function fotoPerfil($fotoUsers=''){
  $fotoUsers = ( !empty($fotoUsers) ? $fotoUsers : Auth()->user()->foto );
  return ( file_exists($fotoUsers) ? $fotoUsers : '/clientes/sem_foto.png' );
}