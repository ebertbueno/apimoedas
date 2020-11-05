<?php
function testeRecursivo($desejado=10,$rotacoes=0){
	$valor = rand(1,100);

	if( (int)$valor === (int)$desejado ){
		return 'rotacoes: ' . $rotacoes . '<br>retorno: ' . $desejado;
	} else {
		$rotacoes++;
		return testeRecursivo($desejado,$rotacoes);
	}
	exit;
}