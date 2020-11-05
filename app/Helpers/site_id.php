<?php
function site_id(){
    $url = strtolower(limpaUrl("$_SERVER[HTTP_HOST]"));
    $qualTema['qualTema'] = ( !empty($_SESSION['qualTema']) ? $_SESSION['qualTema'] : 'inspinia' );
    $qualTema['name'] = ( !empty($_SESSION['name']) ? $_SESSION['name'] : env('APP_NAME', '') );
    return $qualTema;
}