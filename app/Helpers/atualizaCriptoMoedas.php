<?php
function atualizaCriptoMoedas(){

	$consultaUltimo = Model('CriptoMoedasConversoes')::orderby('id','desc')->first('timestamp');
	$consultaUltimo = ( !empty($consultaUltimo) ? $consultaUltimo['timestamp'] : 0 );

    // pega a diferença de tempo do último timestamp até agora
	if( configuracoesGlobais()['tempo_intervalo_entre_atualizacao'] < timestampAtual() ){
		$urlbase = "https://blockchain.info/ticker";

		$json_file = file_get_contents($urlbase);
		$json_str = json_decode($json_file, true);

		$date = date_create();
		$timestamp = date_timestamp_get($date);

		foreach( $json_str as $key => $data ){
			$dados = [
				'moeda_origem' => $key,
				'ultimo' => $data['last'],
				'compra' => $data['buy'],
				'venda' => $data['sell'],
				'timestamp' => $timestamp,
				'json' => $json_file 
			];
			Model('CriptoMoedasConversoes')::create($dados);
		}

		atualizaCotacaoMoedas();
	}
}