<?php
function pegaIPUsuario(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP)) {
        $qualIp = $client;
    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $qualIp = $forward;
    }else{
        $qualIp = $remote;
    }

    $verificaIP = Model('IpsBloqueados')::where('ip', $qualIp)->first();
    if( empty($verificaIP) ){
        return $qualIp;
    }

    return [trataTraducoes($verificaIP['motivo_bloqueio'])];
}