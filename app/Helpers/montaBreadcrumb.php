<?php
function montaBreadcrumb($local) {
	$consulta = Model('Cabecalhos')::where('local',$local)->first();

	if( !empty($consulta) ){
		return trataTraducoes($consulta['titulo']) . ' / ' . trataTraducoes($consulta['subtitulo']);
	}
	return trataTraducoes('Painel');
}