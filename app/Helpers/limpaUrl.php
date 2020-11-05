<?php
function limpaUrl($url){
  $campos01 = array('http://', 'https://', 'www.');
  $campos02 = array('', '', '', '');
  $url = str_replace($campos01, $campos02, $url);

  return $url;
}