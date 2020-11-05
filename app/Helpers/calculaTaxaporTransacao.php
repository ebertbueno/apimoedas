<?php
function calculaTaxaporTransacao($valor,$qualTransacao){
  $valor = currencyToSystemDefaultBD( is_numeric($valor) ? number_format($valor,8) : $valor );

  $valorTaxa = ( !empty(configuracoesPlataforma()['taxa|'.$qualTransacao]) ? configuracoesPlataforma()['taxa|'.$qualTransacao] : 0 );

  $verificaTipoValorTaxa = strpos($valorTaxa, '%');
  $valorTaxa = ( $verificaTipoValorTaxa ? str_replace('%', '', $valorTaxa)/100 : $valorTaxa );

  $retorno['valorEntrada'] = currencyToSystemDefaultBD( is_numeric($valor) ? number_format($valor,8) : $valor );
  $retorno['valorTaxa'] = currencyToSystemDefaultBD( is_numeric($valorTaxa) ? number_format($valorTaxa,8) : $valorTaxa );
  $retorno['valorCalculado'] = number_format($valor*$valorTaxa,8);

  switch ($qualTransacao) {
    case 'offer_book':
    $retorno['valorSaida'] = currencyToSystemDefaultBD(number_format($retorno['valorEntrada']-$retorno['valorCalculado'],8));
    break;

    default:
    $retorno['valorSaida'] = currencyToSystemDefaultBD(number_format($retorno['valorEntrada']+$retorno['valorCalculado'],8));
    break;
  }


  $retorno['valorEntrada'] = ( !empty($retorno['valorEntrada']) ? $retorno['valorEntrada'] : 0 );
  $retorno['valorTaxa'] = ( !empty($retorno['valorTaxa']) ? $retorno['valorTaxa'] : 0 );
  $retorno['valorCalculado'] = ( !empty($retorno['valorCalculado']) ? $retorno['valorCalculado'] : 0 );
  $retorno['valorSaida'] = ( !empty($retorno['valorSaida']) ? $retorno['valorSaida'] : 0 );

  return $retorno;
}