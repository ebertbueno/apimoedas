<div class="ibox ">
	<div class="ibox-title">
		{!! !empty($data['subtitulo']) ? '<span class="label label-'.$data['cor'].' float-right">' : '' !!}
			{!! !empty($data['subtitulo']) ? $data['subtitulo'] : '' !!}
		{!! !empty($data['subtitulo']) ? '</span>' : '' !!}
		<h5>{!! !empty($data['titulo']) ? $data['titulo'] : '' !!}</h5>

		<div class="ibox-tools" style="width: 20% !important;">
			<div class="row" style="padding: 0px">
				<div style="padding: 0px" class="col-lg-6">
					<a data-toggle="modal" data-target="#modalQRCode"><img src="/icones/pagar_qrcode.svg" style="height: 25px;"></a>
					<div class="modal inmodal" id="modalQRCode" tabindex="-1" role="dialog"  aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content animated fadeIn">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<i class="fa fa-qrcode modal-icon"></i>
									<h4 class="modal-title">{!! trataTraducoes('Link de recomendações') !!}</h4>
								</div>
								<div class="modal-body">
									<img src="/geraqrcode?tipo=url&destino={!! url('register/'.Auth()->user()->matricula) !!}" style="width: 100%;">
								</div>
							</div>
						</div>
					</div>

				</div>
				<div style="padding: 0px" class="col-lg-5">
					{!! copiatesteConteudo(['conteudo'=>url('/register/'.Auth()->user()->matricula),'texto'=>'link_de_recomendacao_copiado_com_sucesso','alinhamento'=>'float-right']) !!}
				</div>
				<div style="padding: 0px" class="col-lg-1">
					&nbsp;
				</div>
			</div>
		</div>

	</div>
	<div class="ibox-content">
		<h3 class="text-center">{!! url('/register/'.Auth()->user()->matricula) !!}</h3>
		@if(!empty($data['porcentagem']))
		<div class="stat-percent font-bold text-success">{!! $data['porcentagem'] !!}
			@if(!empty($data['icone']))
			<i class="{!! $data['icone'] !!}"></i>
			@endif
		</div>
		@endif
		@if(!empty($data['subtexto']))
		<small>{!! $data['subtexto'] !!}</small>
		@endif
	</div>
</div>





<?php
/*
*************************** BKP ***************************

<div class="ibox ">
	<div class="ibox-title">
		{!! !empty($data['subtitulo']) ? '<span class="label label-'.$data['cor'].' float-right">' : '' !!}
			{!! !empty($data['subtitulo']) ? $data['subtitulo'] : '' !!}
		{!! !empty($data['subtitulo']) ? '</span>' : '' !!}
		<h5>{!! !empty($data['titulo']) ? $data['titulo'] : '' !!}</h5>

		<div class="ibox-tools">
			{!! copiatesteConteudo(['conteudo'=>url('/register/'.Auth()->user()->matricula),'texto'=>'link_de_recomendacao_copiado_com_sucesso',]) !!}
		</div>

	</div>
	<div class="ibox-content">
		<input type="text" value="{!! url('/register/'.Auth()->user()->matricula) !!}" style="width: 100%; border: 0px; background-color: transparent; font-size: 17pt; text-align: center;" readonly="readonly" class="copiarConteudoHTML" id="copiarConteudoHTML">
		@if(!empty($data['porcentagem']))
		<div class="stat-percent font-bold text-success">{!! $data['porcentagem'] !!}
			@if(!empty($data['icone']))
			<i class="{!! $data['icone'] !!}"></i>
			@endif
		</div>
		@endif
		@if(!empty($data['subtexto']))
		<small>{!! $data['subtexto'] !!}</small>
		@endif
	</div>
</div>

*/
?>