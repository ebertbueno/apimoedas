<?php
function configuracoesConsultorio(){
	$data = Model('UsersConfiguracoes')::get();

	$dados = [];
	foreach( $data as $key => $datas ){
		$dados[$datas['configuracaoInfo']['chave']] = $datas['configuracaoInfo']['conteudo'];
	}

	return $dados;
}