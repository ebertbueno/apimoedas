<?php
function contaIndicacoes_por_data($intervaloDatas){
	if( Auth()->check() ){
		$intervaloDatas = ( !empty($intervaloDatas) ? $intervaloDatas : [date('Y-m-01 00:00:00'),date('Y-m-'.ultimoDiaMes().' 23:59:59')] );
		$total = Model('Users')::where('root', Auth()->user()->id)->whereBetween('created_at',$intervaloDatas)->count();
		return $total;
	}
}