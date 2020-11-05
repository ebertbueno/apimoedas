<?php
function dateBdToApp($date,$ano=4){
  $old = new Datetime($date);
  switch ($ano) {
    case 4:
    return $old->format(idiomaPadrao('data'));
    break;

    default:
    return $old->format(idiomaPadrao('data'));
    break;
  }
}