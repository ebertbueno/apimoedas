<?php
function pegaMensagensUsuario(){
	return Model('Correio')->
	join('correio_leitura','correio_leitura.correio_id','=','correio.id')->
	where('correio.users_id_to', Auth()->user()->id)->
	where('correio_leitura.correio_id','<>',Null)->
	get();
}