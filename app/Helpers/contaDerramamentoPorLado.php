<?php
function contaDerramamentoPorLado(){
	if( Auth()->check() ){
		$retorno = Model('UserArvoreIndicados')::select(['id','root','name','email','foto'])->find(Auth()->user()->id);

		$pernaEsquerda = ( !empty($retorno['registroPai'][0]) ? $retorno['registroPai'][0] : [] );
		$pernaDireita = ( !empty($retorno['registroPai'][1]) ? $retorno['registroPai'][1] : [] );

		$totalPernaEsquerda = 0;
		$totalPernaDireita = 0;

		return compact('pernaEsquerda','pernaDireita','totalPernaEsquerda','totalPernaDireita');
	}
}