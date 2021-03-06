<link href="/temas/inspinia/css/bootstrap.min.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/font-awesome/css/font-awesome.css?v={!! versaoSistema() !!}" rel="stylesheet">

@if( !empty($_GET['imprime']) )
<style>
	.tituloComprovante{
		text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;
	}
	.subTituloComprovante{ 
		text-transform: uppercase !important;
		font-size: 14pt !important;
		font-weight: bold !important;
	}
	.textoTituloComprovante{
		text-transform: uppercase !important;
		font-size: 12pt !important;
	} 
	.bordaSeparador{
		border-top: 2px solid #E2E398 !important;
		width: 90% !important;
		margin-left: 5% !important;
	}
</style>


<div class="container-fluid">
	<div class="col-md-2">&nbsp;</div>
	<div class="col-md-8">
		@endif


		@if( empty($_GET['imprime']) )
		<div class="col-md-12">&nbsp;</div>
		<div class="col-md-12">
			<a href="?imprime=s">
				<li class="btn btn-default btn-xs">
					<i class="fa fa-print"></i> {!! trataTraducoes('imprimir') !!}
				</li>
			</a>
		</div>
		<div class="col-md-12">&nbsp;</div>
		@endif


		<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #F4F4B6;">
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>
				<td style="width: 5%">&nbsp;</td>
				<td style="width: 70%">
					
					<p style="text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;text-align: center;">{!! trataTraducoes('comprovante') !!} ( {!! trataTraducoes($data['tipo']) !!} )</p>

					<p style="border-top: 2px solid #E2E398 !important;width: 90% !important;margin-left: 5% !important;"></p>

					<p style="text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;"> {!! trataTraducoes('dados_do_cliente') !!}</p>

					<p><i class="fa fa-user"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;"> {!! trataTraducoes('nome') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! Auth()->user()->name !!}</span></p>
					{{-- <p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;"> {!! trataTraducoes('email') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;"> {!! Auth()->user()->email !!}</span></p> --}}
					
					@if( !empty($data['UsuarioDestino']) )
					<p style="border-top: 2px solid #E2E398 !important;width: 90% !important;margin-left: 5% !important;"></p>
					<p style="text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;"> {!! trataTraducoes('beneficiario') !!}</p>
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;"> {!! trataTraducoes('nome_fantasia') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! $data['QualCarteiraDestino']['QualUsuario']['name'] !!}</span></p>
					{{-- <p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;"> {!! trataTraducoes('email') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! $data['QualCarteiraDestino']['QualUsuario']['matricula'] !!}</span></p> --}}
					@endif 
					
					<p style="border-top: 2px solid #E2E398 !important;width: 90% !important;margin-left: 5% !important;"></p>

					<p style="text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;"> {!! trataTraducoes('dados_do_comprovante') !!}</p> 
					
					<p><i class="fa fa-codepen"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('codigo') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;"><small style="word-wrap: break-word;">{!! $data['codigo_transacao']!!}</small></span></p>
					
					<p><i class="fa fa-shopping-cart"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('forma_pagamento') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! trataTraducoes(''.$data['tipo'].'') !!}</span></p>

					<p><i class="fa fa-chevron-right"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('carteira_origem') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! trataTraducoes(''.infoCarteira($data['carteira_id_origem'])['nome'].'') !!}</span></p>

					<p><i class="fa fa-chevron-left"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('carteira_destino') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! trataTraducoes(''.infoCarteira($data['carteira_id_destino'])['nome'].'') !!}</span></p>

					<p><i class="fa fa-calendar"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('data_da_solicitacao') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! dateBdToApp($data['created_at']) !!}</span></p>

					<p><i class="fa fa-hourglass"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('hora_da_solicitacao') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! explode(' ',dateTimeBdToApp($data['created_at']))[1] !!}</span></p>
					
					{{-- <p><i class="fa fa-btc"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('valor_solicitado') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">BTC {!! json_decode(json_decode($data['json_transacao'])->json_transacao)->total !!}</span></p> --}}

					<p><i class="fa fa-percent"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('percentual_encargos') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! $data['porcentagem_plataforma'] !!}</span></p>

					<p><i class="fa fa-money"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('valor_encargos') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{{ moeda_usuario() }} {!! ($data['users_id_destino']== Auth()->user()->id ) ? conversorMoedas($data['valor_plataforma'],moeda_padrao(), moeda_usuario(), 2) : '0.00' !!}</span></p>
                    
					<p><i class="fa fa-dollar"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('total') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{{ moeda_usuario() }} {!! ($data['users_id_destino'] == Auth()->user()->id) ? conversorMoedas($data['valor'] - $data['valor_plataforma'], moeda_padrao(), moeda_usuario(), 2) : number_format($data['valor'],2,'.',',') !!}</span></p>
					
					<p><i class="fa fa-calendar"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('data_hora_inicio_transacao') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! dateTimeBdToApp($data['created_at']) !!}</span></p>

					<p><i class="fa fa-calendar"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('data_hora_termino_transacao') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! dateTimeBdToApp($data['updated_at']) !!}</span></p>

					<p style="border-top: 2px solid #E2E398 !important;width: 90% !important;margin-left: 5% !important;"></p>
				</td>
				<td style="width: 5%">&nbsp;</td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
		</table>
		@if( !empty($_GET['imprime']) )
	</div>
</div>
@endif