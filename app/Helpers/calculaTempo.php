<?php
function calculaTempo($hora_inicial, $hora_final=''){
	$i = 1;
	$tempo_total;

	$hora_inicial = date('h:m:s', strtotime('+1 minute', strtotime($hora_inicial)));
	$hora_final = date('h:m:s', strtotime('+3 hours', strtotime($hora_inicial)));

	return $hora_final;
}