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
				<i class="fa fa-print"></i> {!! trataTraducoes('Imprimir') !!}
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
					
					<p style="text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;text-align: center;">{!! trataTraducoes('Comprovante') !!} ( {!! trataTraducoes($data['tipo']) !!} )</p>
					<p style="border-top: 2px solid #E2E398 !important;width: 90% !important;margin-left: 5% !important;"></p>
					<p style="text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;"> {!! trataTraducoes('Dados do cliente') !!}</p>
					<p><i class="fa fa-user"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;"> {!! trataTraducoes('Nome') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! Auth()->user()->name !!}</span></p>
					{{-- <p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;"> {!! trataTraducoes('Email') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;"> {!! Auth()->user()->email !!}</span></p> --}}
					
					@if( !empty($data['UsuarioDestino']) )
					<p style="border-top: 2px solid #E2E398 !important;width: 90% !important;margin-left: 5% !important;"></p>
					<p style="text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;"> {!! trataTraducoes('Beneficiário') !!}</p>
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;"> {!! trataTraducoes('Nome fantasia') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! $data['QualCarteiraDestino']['QualUsuario']['name'] !!}</span></p>
					{{-- <p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;"> {!! trataTraducoes('Email') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! $data['QualCarteiraDestino']['QualUsuario']['email'] !!}</span></p> --}}
					@endif 
					
					<p style="border-top: 2px solid #E2E398 !important;width: 90% !important;margin-left: 5% !important;"></p>
					<p style="text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;"> {!! trataTraducoes('Dados do comprovante') !!}</p> 
					
					<p><i class="fa fa-codepen"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Código') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;"><small style="word-wrap: break-word;">{!! $data['codigo_transacao']!!}</small></span></p>
					
					<p><i class="fa fa-shopping-cart"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Forma de pagamento') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! trataTraducoes(''.$data['tipo'].'') !!}</span></p>
					<p><i class="fa fa-chevron-right"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Carteira de origem') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! trataTraducoes(''.infoCarteira($data['carteira_id_origem'])['nome'].'') !!}</span></p>
					<p><i class="fa fa-chevron-left"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Carteira de destino') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! trataTraducoes(''.infoCarteira($data['carteira_id_destino'])['nome'].'') !!}</span></p>

					<p><i class="fa fa-calendar"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Data de pagamento') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! dateBdToApp($data['created_at']) !!}</span></p>
					<p><i class="fa fa-hourglass"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Hora de pagamento') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! explode(' ',dateTimeBdToApp($data['created_at']))[1] !!}</span></p>
					
					@if($data['tipo'] == 'receive')
					<p><i class="fa fa-info"></i><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Referente') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! $data['referente'] !!}</span></p>
					@endif


					@if($data['tipo'] == 'deposits')
						<p><i class="fa fa-bitcoin"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Valor depositado') !!} (Blockchain): </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;"></b>{{ conversorMoedas($data['valor'], moeda_padrao(), 'BTC',true) }} BTCs</span></p>
						<p><i class="fa fa-folder"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Carteira para depósito') !!} (Blockchain): </span> <span style="font-size: 12pt !important;"> {{ $data['identificador_BTC']}}</span></p>
						<p><i class="fa fa-euro"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Moeda utilizada') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">BTC</span></p>
						<p><i class="fa fa-check"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Confirmações') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{{ $data['confirmacoes_blockchain'] }}</span></p>
					@else
						<p><i class="fa fa-money"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Valor de pagamento') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{{ moeda_usuario() }} {!! conversorMoedas($data['valor'], moeda_padrao(), moeda_usuario(),true)!!}</span></p>
						<p><i class="fa fa-percent"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Percentual de encargos') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! $data['porcentagem_plataforma'] !!}</span></p>
						<p><i class="fa fa-money"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Valor dos encargos') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{{ moeda_usuario() }} {!! conversorMoedas($data['valor_plataforma'],moeda_padrao(), moeda_usuario(), true) !!}</span></p>
						<p><i class="fa fa-dollar"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Total') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{{ moeda_usuario() }} {!! conversorMoedas($data['valor'] + $data['valor_plataforma'], moeda_padrao(), moeda_usuario(), true) !!}</span></p>
					@endif
					

					<p><i class="fa fa-calendar"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Data/Hora do início da transação') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! dateTimeBdToApp($data['created_at']) !!}</span></p>
					<p><i class="fa fa-calendar"></i> <span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Data/Hora do término da transação') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! dateTimeBdToApp($data['updated_at']) !!}</span></p>
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