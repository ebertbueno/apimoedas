<?php
function iconePorFormatodeArquivo($arquivo){

  $qualFormato = explode('.',$arquivo);
  $qualFormato = $qualFormato[count($qualFormato)-1];

  switch ($qualFormato) {
    case 'mp3':
    $icone = 'fa fa-music';
    break;

    case 'mpg4':
    $icone = 'fa fa-film';
    break;

    case 'xls':
    case 'xlsx':
    $icone = 'fa fa-bar-chart-o';
    break;

    case 'jpg':
    case 'jpeg':
    case 'gif':
    case 'bmp':
    case 'png':
    $icone = 'fa fa-picture-o';
    break;

    default:
    $icone = 'fa fa-file';
    break;
}

return $icone;
}