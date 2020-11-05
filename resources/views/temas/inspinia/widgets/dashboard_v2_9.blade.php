<div class="ibox ">
	<div class="ibox-title">
		{!! !empty($data['subtitulo']) ? '<span class="label label-'.$data['cor'].' float-right">' : '' !!}
			{!! !empty($data['subtitulo']) ? $data['subtitulo'] : '' !!}
		{!! !empty($data['subtitulo']) ? '</span>' : '' !!}
		<div class="row" style="padding-left: 15px;">
			<div class="col-lg-12">
				<h5>{!! !empty($data['titulo']) ? $data['titulo'] : '' !!}</h5>
			</div>
		</div>
	</div>
	<div class="ibox-content" style="height: 375px;">
		<div class="row">
			<div class="tabs-container" style="width: 100% !important;">
				<ul class="nav nav-tabs" role="tablist">
					<li style="width: 50% !important"><a class="nav-link active" data-toggle="tab" href="#tab-1"><i class="fa fa-barcode"></i> {!! trataTraducoes('Pagar via código') !!}</a></li>
					<li style="width: 50% !important"><a class="nav-link" data-toggle="tab" href="#tab-2"><i class="fa fa-qrcode"></i> {!! trataTraducoes('Pagar via QR-Code') !!}</a></li>
				</ul>
				<div class="tab-content" style="height: 100% !important;">
					<div role="tabpanel" id="tab-1" class="tab-pane active">
						<div class="panel-body" style="height: 310px;">
							<form name="formulario" id="formulario" action="/financial/payments" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar.disabled=true; finalizaSummernote()">
							    @csrf

							    {!! montaCamposFormulario([
							        'tamDiv' => 0,
							        'tamLabel' => 12,
							        'tipo' => 'labelComTexto',
							        'label' => 'codigo_transacao',
							        'nome_no_banco_de_dados'=>'hash',
							        'valor_inicial'=>( !empty($data['ativo']) ? $data['ativo'] : ''),
							    ]) !!}

							    {!! montaCamposFormulario([
							        'tamDiv' => 12,
							        'tamLabel' => 0,
							        'nome_no_banco_de_dados'=>'hash',
							        'valor_inicial'=>( !empty($data['ativo']) ? $data['ativo'] : ''),
							    ]) !!}

							    {!! montaCamposFormulario([
							    	'tamDiv' => 12,
							        'tamLabel' => 0,
							        'tipo'=>'BotaoModalSalvar',
							        'size'=>10,
							        'icone'=>'fa fa-search',
							        'titulo'=>'buscar',
							        'cor' => 'primary'
							    ],'b') !!}

							    <script src="/temas/inspinia/js/popper.min.js?v={!! versaoSistema() !!}"></script>
							    <script src="/temas/inspinia/js/bootstrap.js?v={!! versaoSistema() !!}"></script>
							    <script src="/temas/inspinia/js/plugins/summernote/summernote-bs4.js?v={!! versaoSistema() !!}"></script>
							</form>
							@include('temas.inspinia.formulario_rodape')
							<div style="padding-right: 2px; width: 100%; float: left; display: none;">
							    <div class="progress">
							        <div class="bar"></div>
							        <div class="percent"></div >
							    </div>
							</div>
							<div id="status"></div>
							<script src="/js/jquery.form.js?v={!! versaoSistema() !!}"></script>
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
					<div role="tabpanel" id="tab-2" class="tab-pane">
						<div class="panel-body" style="height: 310px;">
							<video id="preview"></video>
							<script type="text/javascript">
								let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
								scanner.addListener('scan', function (content) {
									console.log(content);
								});
								Instascan.Camera.getCameras().then(function (cameras) {
									if (cameras.length > 0) {
										scanner.start(cameras[0]);
									} else {
										console.error('No cameras found.');
									}
								}).catch(function (e) {
									console.error(e);
								});
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
/*

<div class="ibox ">
	<div class="ibox-title">
		{!! !empty($data['subtitulo']) ? '<span class="label label-'.$data['cor'].' float-right">' : '' !!}
			{!! !empty($data['subtitulo']) ? $data['subtitulo'] : '' !!}
		{!! !empty($data['subtitulo']) ? '</span>' : '' !!}
		<div class="row" style="padding-left: 15px;">
			<div class="col-lg-3">
				<h5>{!! !empty($data['titulo']) ? $data['titulo'] : '' !!}</h5>
			</div>
			<div class="col-lg-9">
				{!! montaCamposFormulario(['cor'=>'primary btn-block','url'=>'/financial/payments/create/paste','tipo'=>'LinkGeralIcone','icone'=>'fa fa-usd','label'=>'novo_pagamento_por_codigo_de_transacao'],'b') !!}
			</div>
		</div>
	</div>
	<div class="ibox-content">
		<video id="preview"></video>
		<script type="text/javascript">
			let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
			scanner.addListener('scan', function (content) {
				console.log(content);
			});
			Instascan.Camera.getCameras().then(function (cameras) {
				if (cameras.length > 0) {
					scanner.start(cameras[0]);
				} else {
					console.error('No cameras found.');
				}
			}).catch(function (e) {
				console.error(e);
			});
		</script>
	</div>
</div>

*/
?>