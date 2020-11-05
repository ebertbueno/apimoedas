<?php
function trataTraducoesAtualiza($traducoesID='',$palavra,$idioma='pt-br'){
  $consultaSeJaExiste = Model('Traducoes')::where($idioma, $palavra)->first();

  if( !empty($consultaSeJaExiste) ){
    return $consultaSeJaExiste['chave'];
  }

  if( !empty($traducoesID) && strpos($traducoesID, 'traducoes|') >= 0 ){
    Model('Traducoes')::find((int)str_replace('traducoes|','',$traducoesID))->update([$idioma => $palavra]);
    return $traducoesID;
  } else {
    $ultimo = Model('Traducoes')::create([$idioma => $palavra]);
    Model('Traducoes')::find($ultimo['id'])->update(['chave' => 'traducoes|'.$ultimo['id'].'']);

    EscreveArquivoTraducaoLaravel::EscreveArquivoTraducaoLaravel();
    return 'traducoes|'.$ultimo['id'];
  }
}