<?php
function Widgets($local='dashboard'){
	$widgets = Model('Widgets')::where('root',0)->where('local',$local)->orderby('label')->get();

	$montagem = [];
	foreach( $widgets as $key => $widgetsMontagem ){
		$montagem[$key][$widgetsMontagem['label']] = $widgetsMontagem['valor'];
		$montagem[$key]['data'] = [];

		foreach( $widgetsMontagem['menuFilho'] as $widgets01 ){
			if( count($widgets01['menuFilho']) ){
				$montagem[$key]['data']['data'] = [];
				foreach( $widgets01['menuFilho'] as $widgets02 ){
					$montagem[$key]['data']['data'][$widgets02['chave']][$widgets02['label']] = $widgets02['valor'];
				}
			} else {
				$montagem[$key]['data'][$widgets01['label']] = $widgets01['valor'];
			}
		}
	}
	return $montagem;
}