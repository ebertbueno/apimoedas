<?php
function capturaDadosdeAjuda(){
  $url = "$_SERVER[REQUEST_URI]";

  return Model('Ajuda')::where('url',$url)->first();
}