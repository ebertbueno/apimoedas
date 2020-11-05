<?php
function consultaExtratoUsuario($dataInicial='',$dataFinal=''){
  if( Auth()->check() ){
    $dataInicial = ( !empty($dataInicial) ? $dataInicial : date('Y-m-01 h:m:s') );
    $dataFinal = ( !empty($dataFinal) ? $dataFinal : date('Y-m-'.ultimoDiaMes().' h:m:s') );
    $data = Model('FinanceiroSemRelacionamento')::where('users_id_origem', Auth()->user()->id)->orWhere('users_id_destino', Auth()->user()->id)->whereBetween('created_at',[$dataInicial,$dataFinal])->orderby('created_at','desc')->get();

    $consulta = Model('FinanceiroSemRelacionamento')::select('tipo')->groupby('tipo')->where('users_id_origem', Auth()->user()->id)->orWhere('users_id_destino', Auth()->user()->id)->whereBetween('created_at',[$dataInicial,$dataFinal])->get();
    $tiposDados['geral'] = ['url'=>'all', 'cor'=>'link', 'label'=>'resumo', 'icone'=>'fa fa-list-alt' ];
    foreach( $consulta as $tipo ){
      $tiposDados[$tipo['tipo']] = ['url'=>$tipo['tipo'],'label'=>$tipo['tipo']];
    }

    return compact('data','tiposDados');
  }
  return [];
}