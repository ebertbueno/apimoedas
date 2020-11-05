<?php

function configuracoesGlobais(){
	$consultaConfiguracoes = Model('Configuracoes')::get();

	$retorno = [];
	foreach( $consultaConfiguracoes as $configuracoes ){
		$retorno[$configuracoes['chave']] = $configuracoes['valor'];
	}

	return $retorno;
}