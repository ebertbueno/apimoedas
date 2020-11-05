<?php
/*
        $alfabeto = 'abcdefghijklmnopqrstuvwxyz';
        $busca = '<a data-ellipsis="2" href="';
        $url = 'https://consultaremedios.com.br/principios-ativos/a';


como usar

	$txt = retirarConteudoExternos($url,8080,30,'/');
	$pos = strrpos($txt, "close\r\n\r\n")+strlen("close\r\n\r\n");
	$txt = substr($txt,$pos,strlen($txt));
	return $txt;

*/

function retirarConteudoExternos($hostname, $port, $timeout, $filepath="", $getData="", $postData="", $userAgent="", $bytes=1024){
	$fp = fsockopen($hostname, $port, $errno, $errstr, $timeout);
	if (!$fp) {
		fclose($fp);
		return "$errstr ($errno)<br />\n";
	} else {
		(strlen($postData)>0)? $method="POST" : $method="GET" ;

		fwrite($fp, "$method $filepath$getData HTTP/1.1\r\n");
		fwrite($fp, "Host: $hostname\r\n");

		if(strlen($postData)>0){
			fwrite($fp, "Content-Type: application/x-www-form-urlencoded\r\n");
			fwrite($fp, "Content-Length: ".strlen($postData)."\r\n");
		}
		if(strlen($userAgent)>0) fwrite($fp, "User-agent: $userAgent\r\n");

		fwrite($fp, "Connection: close\r\n\r\n");
		fwrite($fp, $postData);

		$txt="";
		while (!feof($fp)) {
			$txt .= fgets($fp, $bytes);
		}
		fclose($fp);
		return $txt;
	}
}