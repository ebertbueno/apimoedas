<?php
function moeda_padrao(){
  $data = Model('Configuracoes')::where('chave','moeda_padrao')->first();
  return ( !empty($data['valor']) ? $data['valor'] : 'BRL' );
}