<?php

use Illuminate\Http\Request;

function AtivaMenuLateral($url,$classe="active"){
	return ( Request()->is($url) ? $classe : Null );
}