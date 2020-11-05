<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<h4 style="float: right;">@include('cabecalho')</h4>
				<div class="ibox-title">
					<h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
					<div class="ibox-tools">
						<a class="btn-apagar btn btn-warning btn-xs float-right" data-toggle="tooltip" data-placement="top" style="margin: 0px 2px;" onclick="montaTela('{!! $dados['dados']['rota_geral'] !!}');" title="{!! trataTraducoes('Voltar') !!}">
							<i class="fa fa-mail-reply" style="color: #fff"></i>
							<span style="color: #fff">{!! trataTraducoes('Listar recebimentos') !!}</span>
						</a>
					</div>
				</div>
				<div class="ibox-content">
					<div class="text-center">
						<img src="/geraqrcode?destino={!! $dados['hash'] !!}" style="height: 500px;">
					</div>
					<div class="row">
						<div class="col-lg-11">
							<input type="text" value="{!! $dados['hash'] !!}" style="width: 100%; border: 0px; background-color: transparent; font-size: 17pt; text-align: center;" readonly="readonly" class="copiarConteudoHTML" id="copiarConteudoHTML">
						</div>
						<div class="col-lg-1" style="padding-top: 7px;">
							<a onclick="copiaConteudo('{!! trataTraducoes('Link de recomendação copiado com sucesso') !!}','{!! trataTraducoes('Sucesso') !!}','success','copiarConteudoHTML')" style="cursor: pointer;">
								<i class="fa fa-copy"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>