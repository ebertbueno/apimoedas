<?php
function copyright($local='login',$cor='light'){

	$empresa = 'Digisul LTDA';

	if( $local != 'login' ){
		return '<span>Copyright &copy; 2017-'.date('Y').' COCATREL. Todos os direitos Reservados. Desenvolvido por <a href="http://digisul.com.br/" target="_blank">'.$empresa.'</a></span>';
	}
	return '<span class="text-'.$cor.'">Desenvolvido por <a href="http://digisul.com.br/" target="_blank" class="text-'.$cor.' font-weight-bold">'.$empresa.'</a></span>';
}