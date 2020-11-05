<?php
function MenuGeral($localUso='menu_principal'){
	$data = Model('Menu')::
	where('menu.local_uso', $localUso)->
	where('menu.root', 0)->
	where('users_acessos.users_id', Auth()->user()->nivel)->
	join('users_acessos','users_acessos.menu_id','=','menu.id')->
	where('users_acessos.deleted_at', Null)->
	orderby('menu.ordem')->
	get();
	return $data;

}