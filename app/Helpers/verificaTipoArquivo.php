<?php
function verificaTipoArquivo($arquivo,$layout=1){
    $extensao = explode('.',$arquivo);
    $extensao = $extensao[count($extensao)-1];

    switch ($extensao) {
        case 'zip':
        case 'rar':
        $iconeExtensao = 'fa fa-file-archive-o';
        break;

        case 'doc':
        case 'docx':
        $iconeExtensao = 'fa fa-word-o';
        break;

        case 'xls':
        case 'xlsx':
        $iconeExtensao = 'fa fa-excel-o';
        break;

        case 'jpg':
        case 'jpeg':
        case 'gif':
        case 'png':
        case 'bmp':
        $iconeExtensao = 'fa fa-image-o';
        break;

        default:
        $iconeExtensao = 'fa fa-file';
        break;
    }

    switch ($layout) {
        case 1:
        $retorno = '<div class="file-box"><div class="file"><a href="#"><span class="corner"></span><div class="icon"><i class="'.$iconeExtensao.'"></i></div></a></div></div>';
        break;

        default:
        $retorno = $arquivo;
        break;
    }

    return $retorno;
}