<?php
function mostraMoedaLayoutPadrao($valor,$mostraDIV='s',$mostraMoeda='s'){
	$retorno = ( $mostraDIV === 's' ? '<div class="row">' : Null );
	$retorno .= ( $mostraDIV === 's' ? '<div class="col-lg-8 text-right">' : Null );
	$retorno .= '<span style="white-space:nowrap !important;">';
	$retorno .= number_format(currencyToSystemDefaultBD($valor),2) . '<small>'.( $mostraMoeda === 's' ? ' ( AUR )' : Null ).'</small><br>';
	$retorno .= '<small>' . number_format(currencyToSystemDefaultBD($valor)*configuracoesPlataforma()['valor_moeda_padrao_referente_dolar'],2) . ' '.( $mostraMoeda === 's' ? ' ( USD )' : Null ).' </small>';
	$retorno .= '</span>';
	$retorno .= ( $mostraDIV === 's' ? '</div>' : Null );
	$retorno .= ( $mostraDIV === 's' ? '</div>' : Null );
	return $retorno;
}