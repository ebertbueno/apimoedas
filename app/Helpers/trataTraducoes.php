<?php
use App\Repositories\EscreveArquivoTraducaoLaravel;

function trataTraducoes($palavra, $idioma=''){
  return $palavra;




  if( strlen($palavra) ){
    $idioma = 'pt-BR';

    if( substr($palavra,0,10) === 'traducoes|' ){
      $consultaSeExiste = Model('Traducoes')::find(str_replace('traducoes|','',$palavra))[$idioma];
    } else {
      $consultaSeExiste = Model('Traducoes')::where($idioma, $palavra)->first()[$idioma];
    }

    $chave = $palavra;
    if( strlen($palavra) > 250 ){
      $chave = limitaCaracteres($chave,200);
    }

    if( empty($consultaSeExiste) ){
      $data = [
        'emp_id' => site_id()['emp_id'],
        'chave' => deixaApenasTexto($chave),
        $idioma => $palavra,
      ];
      $ultimo = Model('Traducoes')::create($data);
      EscreveArquivoTraducaoLaravel::EscreveArquivoTraducaoLaravel();
    } else {
      $ultimo = Model('Traducoes')::where($idioma, $palavra)->first();
    }
  }
  return $palavra;
}