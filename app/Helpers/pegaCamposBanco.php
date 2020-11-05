<?php
function pegaCamposBanco($tabela){
	$consulta = DB::select("SELECT COLUMN_NAME FROM information_schema.columns WHERE table_name = '".$tabela."'");
	$consulta = DB::select("SHOW COLUMNS FROM ".$tabela."");
	$retorno = [];
	foreach( $consulta as $key => $colunas ){
		if( $colunas->Extra != 'auto_increment' ){
			$retorno[] = $colunas->Field;
		}
	}
	return $retorno;
}