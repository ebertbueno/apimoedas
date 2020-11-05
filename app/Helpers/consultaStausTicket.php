<?php
function consultaStausTicket($id){
	return Model('TicketsAndamento')::where('ticket_id',$id)->orderby('id', 'desc')->first();
}