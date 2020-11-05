<?php
function pegaDadosdaEmpresa($empId=''){

	$empId = ( !empty($empId) ? $empId : site_id()['id'] );

	return Model('Empresas')::find($empId);
}