<?php
function verificaImagemouIcone($arquivo){
	$verifica = explode('.',$arquivo);

	$verifica1 = explode('texto|',$arquivo);

	if( count($verifica) > 1 ){
		return '<img src="'.$arquivo.'" style="height: 14px !important;">';
	} else if( count($verifica1) > 1 ){
		return str_replace('texto|','',$arquivo);
	} else {
		return '<i class="'.$arquivo.'"></i>';
	}
}