<?php
function Model($model){
	$conexao = 'App\Models\\'.$model.'';
	return new $conexao();
}