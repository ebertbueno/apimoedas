<?php
function extraiSenhaFinanceira($data,$gravaNova='n'){
	foreach( $data as $key => $datas ){
		if( strpos($key, 'senha_financeira') === false ){
		} else {
			$chave = $key;
		}
	}
	return verificaSenhaFinanceira($data[$chave], $key, $gravaNova);
}