<?php
function calculaDiferencaDias($dataIni,$dataFim=''){
	$consulta = strpos($dataIni, ' ');
	$dataIni = ( $consulta ? explode(' ',$dataIni)[0] : $dataIni );

	$dataFim = ( !empty($dataFim) ? $dataFim : date('Y-m-d') );
	$diferenca = strtotime($dataFim) - strtotime($dataIni);
	$dias = floor($diferenca / (60 * 60 * 24));
	return $dias;
}