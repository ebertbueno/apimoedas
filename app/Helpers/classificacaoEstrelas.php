<?php
function classificacaoEstrelas($redeLojaid=1){

	$qdade0 = '<i class="fa fa-star-o"></i>';
	$qdade1 = '<i class="fa fa-star-half-o"></i>';
	$qdade2 = '<i class="fa fa-star"></i>';

	$montado = '<span style="color: #FBD141">' . $qdade2 . $qdade2 . $qdade2 . $qdade1 . $qdade0 . '</span>';

	return $montado;
}