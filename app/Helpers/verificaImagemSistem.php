<?php
function verificaImagemSistem($qualImagem,$saida=''){
	$naoEncontrada = '/paciente_sem_foto.png';
	$imagem = $naoEncontrada;
	if( !is_null($qualImagem) ){
		$imagem = ( file_exists(public_path($qualImagem) . $qualImagem) ? $qualImagem . '?v='.versaoSistema() : $naoEncontrada . '?v='.versaoSistema() );
	}

	switch ($saida) {
		case 'image':
			return '<img src="'.$imagem.'" style="width:auto !important; height: 50px !important;" class="rounded-circle m-t-xs img-fluid">';
			break;
		
		default:
			return $imagem;
			break;
	}

}