<?php
$cor = (!empty($data['cor']) ? $data['cor'] : Null);
$icone = (!empty($data['icone']) ? $data['icone'] : 'fa fa-plus');
$label = trataTraducoes(!empty($data['label']) ? $data['label'] : Null);
$url = (!empty($data['url']) ? $data['url'] : '/');
$cortexto = (!empty($data['cortexto']) ? $data['cortexto'] : '#fff');
$contagem = (!empty($data['contagem']) ? $data['contagem'] : Null);
$contagem = ( $contagem > 0 ? $contagem : Null );

switch ($cor){
	case 'warning':
	$cor = 'yellow-bg';
	break;

	case 'primary':
	$cor = 'navy-bg';
	break;

	case 'info':
	$cor = 'lazur-bg';
	break;

	case 'danger':
	$cor = 'red-bg';
	break;

	default:
	$cor = Null;

}

$cortexto = ( $cor === Null ? '#000' : $cortexto );
?>

<div class="col-lg-12" style="padding: 15px 0px 15px 0px;">
	<div class="widget style1 ibox-content {!! $cor !!}">
		<div class="row text-center">
			<a onclick="montaTela('{!! $url !!}');fechaMenu();" style="color: {!! $cortexto !!}; width: 100% !important;">
				<div class="col-12">
					<i class="{!! $icone !!} fa-3x count-info" style="color: #1AB394"></i>
				</div>
				<div class="col-12">&nbsp;</div>
				<div class="col-12">
					{!! $label !!}
					@if( !empty($contagem) )
					<span class="label label-warning">{!! $contagem !!}</span>
					@endif
				</div>
			</a>
		</div>
	</div>
</div>




<?php
/*
<div class="col-lg-12">
	<div class="widget style1">
		<div class="row">
			<div class="col-4 text-center">
				<i class="fa fa-trophy fa-5x"></i>
			</div>
			<div class="col-8 text-right">
				<span> transparente </span>
				<h2 class="font-bold">$ 4,232</h2>
			</div>
		</div>
	</div>
</div>
*/
?>