@if( $data['qual'] === 'qrcode' )
<div class="ibox">
	<div class="ibox-title">
		{!! !empty($data['subtitulo']) ? '<span class="label label-'.$data['cor'].' float-right">' : '' !!}
			{!! !empty($data['subtitulo']) ? $data['subtitulo'] : '' !!}
		{!! !empty($data['subtitulo']) ? '</span>' : '' !!}
		<h5>{!! !empty($data['titulo']) ? $data['titulo'] : '' !!}</h5>

		<div class="ibox-tools">
			<a onclick="montaTela('{!! $data['url'] !!}')">
				<i class="{!! $data['icone'] !!}"></i>
			</a>
		</div>

	</div>
	<div class="ibox-content text-center" style="height: {!! !empty($data['altura']) ? $data['altura'].'px' : 'auto'; !!} !important; padding: 0px;">
		<img src="./geraqrcode/{!! Auth()->user()->matricula !!}" style="height: 100%">
	</div>
</div>
@endif



@if( $data['qual'] === 'lerqrcode' )
<div class="ibox">
	<div class="ibox-title">
		{!! !empty($data['subtitulo']) ? '<span class="label label-'.$data['cor'].' float-right">' : '' !!}
			{!! !empty($data['subtitulo']) ? $data['subtitulo'] : '' !!}
		{!! !empty($data['subtitulo']) ? '</span>' : '' !!}
		<h5>{!! !empty($data['titulo']) ? $data['titulo'] : '' !!}</h5>

		<div class="ibox-tools">
			<a onclick="montaTela('{!! $data['url'] !!}')">
				<i class="{!! $data['icone'] !!}"></i>
			</a>
		</div>

	</div>
	<div class="ibox-content text-center" style="height: {!! !empty($data['altura']) ? $data['altura'].'px' : 'auto'; !!} !important; padding: 0px;">
		<span v-if="cameras.length === 0" class="empty">
			<div class="row">
				<?php
				/*
				<div class="col-md-1">&nbsp;</div>
				<div class="col-md-10">
					<br>
					<span class="text-left">{!! trataTraducoes('texto_informativo_para_pagamento_na_ausencia_de_cameras') !!}</span>
				</div>
				*/
				?>
				<div class="col-md-12" style="height: 120px;">&nbsp;</div>
				<div class="col-md-1">&nbsp;</div>
				<div class="col-md-10">
					<form name="formulario" id="formulario" action="" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar.disabled=true, this.botaoEnviar.innerHTML='{!! trataTraducoes('Enviando') !!}'">
						@csrf
						{!! montaCamposFormulario(['label'=>'codigo_transacao','nome_no_banco_de_dados'=>'codigo','required'=>1,]) !!}
						{!! montaCamposFormulario(['tipo'=>'BotaoModalSalvar','size'=>10,'icone'=>'fa fa-save','titulo'=>'pagar','cor' => 'primary'	],'b') !!}
					</form>
					@include('temas.inspinia.formulario_rodape')
					<script src="/temas/inspinia/js/popper.min.js"></script>
					<script src="/temas/inspinia/js/bootstrap.js"></script>
					<div id="status"></div>
					<script src="/js/jquery.form.js"></script>
					<script>
						(function() {
							var status = $('#status');
							$('form').ajaxForm({
								beforeSend: function() {
									status.empty();
								},
								success: function() {
								},
								complete: function(xhr) {
									status.html(xhr.responseText);
								}
							}); 
						})();
					</script>
				</div>
			</div>
		</span>
		<?php
		/*
		<script type="text/javascript" src="/qrcode/src/adapter.min.js"></script>
		<script type="text/javascript" src="/qrcode/src/vue.min.js"></script>
		<script type="text/javascript" src="/qrcode/src/instascan.min.js"></script>
		<video id="abreCameraCelular" style="height: 1000px !important;"></video>
		<script type="text/javascript" src="/qrcode/docs/app.js"></script>
		*/
		?>
	</div>
</div>
@endif