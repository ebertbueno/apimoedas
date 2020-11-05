<?php
function breadcrumb($data=''){
	$breadcrumb = '<div class="col-md-12">';
	$breadcrumb .= '<ol class="breadcrumb">';
	$breadcrumb .= '<li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i> Painel de bordo</a></li>';

	$urlAtual = limpaUrl($_SERVER['REQUEST_URI']);

	switch ($urlAtual) {
		case '/cafe/saldo_simulado':
			$data = 'Café|Café simulado';
			break;

		case '/cafe/vendas':
			$data = 'Café|Vendas';
			break;

		case '/cafe/mercado_de_cafe':
			$data = 'Café|Mercado de café';
			break;

		case '/cafe/nf_entrada':
			$data = 'Café|NFe de entrada';
			break;

		case '/cafe/autorizacao_vendas':
			$data = 'Café|Autorização de vendas';
			break;

		case '/laboratorio/analise':
			$data = 'Laboratório|Análise';
			break;

		case '/financeiro/boleto_unimed':
			$data = 'Financeiro|Boleto Unimed';
			break;

		case '/financeiro/imposto_renda':
			$data = 'Financeiro|Imposto de renda';
			break;

		case '/cereais/saldo':
			$data = 'Cereais|Saldo';
			break;

		case '/cereais/extrato':
			$data = 'Cereais|Extrato';
			break;

		case '/laticinio/qualidade':
			$data = 'Laticínio|Qualidade';
			break;

		case '/laticinio/extrato':
			$data = 'Laticínio|Extrato';
			break;

		case '/laticinio/entrada':
			$data = 'Laticínio|Entrada';
			break;
		default:
			# code...
			break;
	}

	if( !empty($data) ){
		$data = explode('|',$data);
		$fim = count($data);
		for( $ini = 0; $ini < $fim; $ini++) {
			$breadcrumb .= '<li class="breadcrumb-item"><a>'.$data[$ini].'</a></li>';
		}
	}

	$breadcrumb .= '</ol>';
	$breadcrumb .= '</div>';

	return $breadcrumb;
}