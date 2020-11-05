<?php
@session_start();

function StatusDoSistema(){

  $url = "$_SERVER[HTTP_HOST]";

  if( strpos($url, 'localhost') === false ){
    return 1;
  } else {
    return 0;
  }
}