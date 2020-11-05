<?php
function adicionaEspacos($textoEntrada,$tamanho=50,$posicao='r'){
	$tamanhoEntrada = strlen($textoEntrada);

	$concatenacao = '';
	for ($i=$tamanhoEntrada; $i <= $tamanho; $i++) { 
		$concatenacao .= '&nbsp;';
	}

	if( $posicao === 'l' ){
		return $concatenacao . $textoEntrada;
	}
	return $textoEntrada . $concatenacao;
}