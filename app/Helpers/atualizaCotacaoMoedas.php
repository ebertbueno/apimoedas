<?php
function atualizaCotacaoMoedas(){

	$chaves = Model('Currencylayer')::orderby('id')->get();
	foreach( $chaves as $consultaChaves ){
		$urlbase = "http://api.currencylayer.com/live?access_key=".$consultaChaves['access_key']."&source=USD&currencies=AED,AFN,ALL,AMD,ANG,AOA,ARS,AUD,AWG,AZN,BAM,BBD,BDT,BGN,BHD,BIF,BMD,BND,BOB,BRL,BSD,BTC,BTN,BWP,BYR,BZD,CAD,CDF,CHF,CLF,CLP,CNY,COP,CRC,CUC,CUP,CVE,CZK,DJF,DKK,DOP,DZD,EGP,ERN,ETB,EUR,FJD,FKP,GBP,GEL,GGP,GHS,GIP,GMD,GNF,GTQ,GYD,HKD,HNL,HRK,HTG,HUF,IDR,ILS,IMP,INR,IQD,IRR,ISK,JEP,JMD,JOD,JPY,KES,KGS,KHR,KMF,KPW,KRW,KWD,KYD,KZT,LAK,LBP,LKR,LRD,LSL,LTL,LVL,LYD,MAD,MDL,MGA,MKD,MMK,MNT,MOP,MRO,MUR,MVR,MWK,MXN,MYR,MZN,NAD,NGN,NIO,NOK,NPR,NZD,OMR,PAB,PEN,PGK,PHP,PKR,PLN,PYG,QAR,RON,RSD,RUB,RWF,SAR,SBD,SCR,SDG,SEK,SGD,SHP,SLL,SOS,SRD,STD,SVC,SYP,SZL,THB,TJS,TMT,TND,TOP,TRY,TTD,TWD,TZS,UAH,UGX,UYU,UZS,VEF,VND,VUV,WST,XAF,XAG,XAU,XCD,XDR,XOF,XPF,YER,ZAR,ZMK,ZMW,ZWL&format=1";

		$json_file = file_get_contents($urlbase);
		$json_str = json_decode($json_file, true);

		if( $json_str['success'] === true ){
			$retorno = $json_str;
		}
	}

	foreach( $json_str['quotes'] as $key => $data ){
		Model('MoedasConversoes')::create([
			'moeda_origem' => $json_str['source'],
			'moeda_destino' => $key,
			'valor' => $data,
			'timestamp' => $json_str['timestamp'],
			'access_key' => 'adc8612e34f5e05f3ad70739d69df1bc',
			'json' => $json_file
		]);
	}
}