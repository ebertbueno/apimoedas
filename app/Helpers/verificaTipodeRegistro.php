<?php
function verificaTipodeRegistro($registro){
	if( count(explode('.',$registro)) > 1 ){
		return 'file';
	}

	if( strlen(str_replace('#','',$registro)) === 6 ){
		return 'color';
	}
	return 'textarea';
}