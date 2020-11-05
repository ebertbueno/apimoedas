<?php
function usarJsonSite($arquivo){
	$url = resource_path() . '/views/' . $arquivo;
	$url = str_replace('//', '/', $url);
	$url = str_replace('\/', '/', $url);

	return require_once($url);
}