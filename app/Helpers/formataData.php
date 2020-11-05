<?php
function formataData($data,$formato='d/m/Y'){
	$consulta = strpos($data, ' ');
	if( $consulta === false ){
		$data = $data;
	} else {
		$data = explode(' ',$data)[0];
	}

	if( strlen($data) < 7 ){
		return ' - ';
	}
	return date($formato, strtotime($data));
}