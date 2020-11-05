<?php
function verificarotaShow(){
  $url = explode('/',"$_SERVER[REQUEST_URI]");
  return $url[count($url)-1];
}