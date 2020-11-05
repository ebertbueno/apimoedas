<?php
function consultaTiposAlertas(){
	$tipos = Model('AlertasTipo')::select(['id','titulo'])->get();

	$novo = [];
	foreach( $tipos as $tipo ){
		$novo[] = [ 
			'id' => $tipo['id'],
			'titulo' => trataTraducoes($tipo['titulo']),
		];
	}

	return $novo;
}