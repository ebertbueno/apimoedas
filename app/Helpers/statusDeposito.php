<?php
function statusDeposito($statusID=0){
  switch ($statusID) {
    case 0:
    return trataTraducoes('pendente');
    break;

    default:
    return trataTraducoes('aprovado');
    break;
  }
}