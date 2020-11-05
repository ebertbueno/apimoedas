<?php
function verificaSePossuiSenhaFinanceira(){
	if( Auth()->check() ){
		return Model('UsersPin')::where('users_id', Auth()->user()->id)->count();
	}
}