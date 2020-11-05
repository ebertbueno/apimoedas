<?php
function pegaContatosChat(){
	return Model('ListadeContatos')::with('dadosDoCliente')->where('users_id', Auth()->user()->id)->where('cli_id', '<>', Auth()->user()->id)->get();
}