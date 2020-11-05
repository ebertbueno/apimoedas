<?php
function buscaMovimentacoesFinanceiras($tipo='transfer',$intervaloDatas='',$saida='somado'){
	if( Auth()->check() ){

		$intervaloDatas = ( !empty($intervaloDatas) ? $intervaloDatas : [date('Y-m-01 00:00:00'),date('Y-m-'.ultimoDiaMes().' 23:59:59')] );

		if( $saida === 'somado' ){
			$retorno = Model('Financeiro')::where('tipo',$tipo)->whereBetween('created_at', $intervaloDatas)->sum('total');
		} else {
			$retorno = Model('Financeiro')::where('tipo',$tipo)->orderby('id','desc')->get();
		}

		return $retorno;
	}
}