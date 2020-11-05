<?php
function adicionaTemponaData($data,$tempo,$operacao,$formatoSaida='Y-m-d H:I:s'){
	$dataFormatada = date($formatoSaida, strtotime($operacao.$tempo, strtotime($data)));
	return strtotime($dataFormatada) - strtotime($data);
	return calculaDiferencaDias($data, $dataFormatada);
}