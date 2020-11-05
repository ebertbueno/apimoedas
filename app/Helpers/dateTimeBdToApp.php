<?php
function dateTimeBdToApp($date){
  $old = new Datetime($date);
  return $old->format(idiomaPadrao('data').' H:i:s');
}

