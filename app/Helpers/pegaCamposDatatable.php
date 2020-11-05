<?php
function pegaCamposDatatable($datatable){
	foreach( $datatable as $listaCampos ){
		$campos[] = $listaCampos['nome_no_banco_de_dados'];
	}
	return $campos;
}