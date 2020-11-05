<?php
function consultaQualDerramar($data){
	foreach( $data as $key => $datas ){
		return $datas['id'];
	}
}