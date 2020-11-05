<?php
// dd($dados);
?>

<script src="/temas/inspinia/js/jquery-3.1.1.min.js?v={!! versaoSistema() !!}"></script>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<h4 style="float: right;">@include('cabecalho')</h4>
				<div class="ibox-title">
					<h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
				</div>
				<div class="ibox-content">
					<div align="center">
						<form name="formulario" id="formulario" action="{!! url('/financial/extracts') !!}" method="GET" onsubmit="return this.botaoEnviar.disabled=true, this.botaoEnviar.innerHTML=' trataTraducoes('Filtrando') !!}'">
							<div class="row">
								<div class="col-lg-4">&nbsp;</div>
								<div class="col-lg-3" style="padding: 0px;">
									 {!! montaCamposFormulario(['nome_no_banco_de_dados'=>'data_inicial','required'=>1,'tipo'=>'date','valor_inicial'=>( !empty($dados['dataInicial']) ? $dados['dataInicial'] : date('Y-m-01')),]) !!}
								</div>
								<div class="col-lg-3" style="padding: 0px;">
									 {!! montaCamposFormulario(['nome_no_banco_de_dados'=>'data_final','required'=>1,'tipo'=>'date','valor_inicial'=>( !empty($dados['dataFinal']) ? $dados['dataFinal'] : date('Y-m-'.ultimoDiaMes())),]) !!}
								</div>
								<div class="col-lg-2">
									 {!! montaCamposFormulario(['tipo'=>'BotaoModalSalvar','size'=>10,'icone'=>'fa fa-search','titulo'=>'filtrar','cor' => 'primary'],'b') !!}
								</div>
							</div>
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

						@foreach( $dados['data']['tiposDados'] as $key => $extensoes )
						<button class="btn btn-default filter-button" data-filter="{!! $extensoes['url'] !!}"> {!! trataTraducoes($extensoes['label']) !!}</button>
						@endforeach
					</div>

					<div class="row">
						<div class="col-sm-12">&nbsp;</div>
					</div>

					<div class="container" style="padding: 0px !important">
						<div class="row" style="width: 100% !important"> 
							<table width="100%" cellpadding="0" cellspacing="0" border="0" class="table table-striped">
								<tr>
									<td class="text-left" style="width: 20%;">{!! trataTraducoes('Tipo') !!}</td>
									<td class="text-left" style="width: 15%;">{!! trataTraducoes('Usuários') !!}</td>
									<td class="text-center" style="width: 20%;">{!! trataTraducoes('Valor') !!}</td>
									<td class="text-center" style="width: 15%;">{!! trataTraducoes('Taxa') !!}</td>
									<td class="text-center" style="width: 20%;">{!! trataTraducoes('Total') !!}</td>
									<td class="text-left" style="width: 10%;">&nbsp;</td>
								</tr> 
								@forelse( $dados['data']['data'] as $key => $dadosExtrato )
								@if( !empty($dados['data']['tiposDados'][$dadosExtrato['tipo']]['label']) )
								{!! layoutExtrato([
									'original' => $dadosExtrato,
									'beneficiado' => $dadosExtrato['users_id_destino'],
									'tipoTransacao' => $dadosExtrato['tipo'],
									'dataTransacao' => $dadosExtrato['created_at'],
									'campoDe' => explode(' ',infoUsuario($dadosExtrato['users_id_origem'])['name'])[0],
									'campoPara' => explode(' ',infoUsuario($dadosExtrato['users_id_destino'])['name'])[0],
									'valorCampo' => mostraMoedaLayoutPadrao($dadosExtrato['valor']),
									'taxaValor' => mostraMoedaLayoutPadrao($dadosExtrato['valor_plataforma']),
									// 'taxaValorFiat' => '(USD '.currencyToSystemDefaultBD($dadosExtrato['valor_plataforma']*configuracoesPlataforma()['valor_moeda_padrao_referente_dolar'],2).')',
									'totalValor' => mostraMoedaLayoutPadrao($dadosExtrato['valor'] + $dadosExtrato['valor_plataforma']),
									// 'totalValorFiat' => '(USD '.currencyToSystemDefaultBD(($dadosExtrato['valor'] + $dadosExtrato['valor_plataforma'])*configuracoesPlataforma()['valor_moeda_padrao_referente_dolar'],2).')',
									
									'hash' => $dadosExtrato['codigo_transacao'],
									]) !!}
								@endif
								@empty
								<tr>
									<td colspan="6" style="text-align: center !important;">{!! trataTraducoes('Nenhum registro encontrado para a data informada') !!}</td>
								</tr>
								@endforelse
			
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){

		$(".filter-button").click(function(){
			var value = $(this).attr('data-filter');
			if(value == "all"){
				$('.filter').show('1000');
			} else {
				$(".filter").not('.'+value).hide('3000');
				$('.filter').filter('.'+value).show('3000');
			}
		});
		if ($(".filter-button").removeClass("active")) {
			$(this).removeClass("active");
		}
		$(this).addClass("active");
	});
</script>