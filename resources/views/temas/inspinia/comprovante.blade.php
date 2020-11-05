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
				<td style="width: 90%">
					<!-- <img src="url(site_id()['logo'])"> -->
					<p style="text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;text-align: center;">{!! trataTraducoes('Comprovante') !!} ( {!! trataTraducoes($data['tipo']) !!} )</p>
					<p style="border-top: 2px solid #E2E398 !important;width: 90% !important;margin-left: 5% !important;"></p>
					<p style="text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;"> {!! trataTraducoes('Dados do cliente') !!}</p>
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;"> {!! trataTraducoes('Nome') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! Auth()->user()->name !!}</span></p>
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;"> {!! trataTraducoes('Email') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;"> {!! Auth()->user()->email !!}</span></p>
					
					@if( !empty($data['UsuarioDestino']) )
					<p style="border-top: 2px solid #E2E398 !important;width: 90% !important;margin-left: 5% !important;"></p>
					<p style="text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;"> {!! trataTraducoes('Beneficiário') !!}</p>
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;"> {!! trataTraducoes('Nome fantasia') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! $data['QualCarteiraDestino']['QualUsuario']['name'] !!}</span></p>
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;"> {!! trataTraducoes('Email') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! $data['QualCarteiraDestino']['QualUsuario']['email'] !!}</span></p>
					@endif

					<p style="border-top: 2px solid #E2E398 !important;width: 90% !important;margin-left: 5% !important;"></p>
					<p style="text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;"> {!! trataTraducoes('Dados do comprovante') !!}</p> 


					@if($data['tipo'] == 'deposits') 
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Código') !!}: </span> <span style="font-size: 14px !important;"><small style="word-wrap: break-word;">{!! (strlen($data['codigo_transacao']) > 64) ? $data['codigo_transacao'][0].'...'.substr($data['codigo_transacao'],-45) : $data['codigo_transacao'] !!}</small></span><a target="_blank" href="https://www.blockchain.com/btc/tx/{{$data['codigo_transacao']}}"> <i class="fa fa-external-link"></i></a></p>
					@else 
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Código') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;"><small style="word-wrap: break-word;">{!! (strlen($data['codigo_transacao']) > 64) ? $data['codigo_transacao'][0].'...'.substr($data['codigo_transacao'],-45) : $data['codigo_transacao'] !!}</small></span></p>
					@endif
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Forma de pagamento') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! trataTraducoes(''.$data['tipo'].'') !!}</span></p>
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Data de pagamento') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! dateBdToApp($data['pagamento']) !!}</span></p>
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Hora do pagamento') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! dateTimeBdToApp($data['pagamento']) !!}</span></p>
					
					@if($data['tipo'] == 'deposits')
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Valor depositado') !!} (Blockchain): </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">moeda_oficial()['sigla']}}  number_format($data['valor'],8,'.',',').' |' !!}  moeda_info()['codigo'] }}  number_format(converte_moeda(moeda_oficial()['sigla'], moeda_info()['codigo'], $data['valor'], json_decode($data['json_transacao'])->dados->cotacao_dolar),2, ',', '.') !!} ({{json_decode($data['json_transacao'])->dados->valor_btc}}<b> BTCs)</b></b></span></p>
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Carteira para depósito') !!} (Blockchain): </span> <span style="font-size: 12pt !important;"> $data['identificador_BTC'] !!}</span></p>
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Valor creditado') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">moeda_oficial()['sigla']}}  number_format($data['valor'],8,'.',',') !!} </span></p>
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Moeda utilizada') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">BTC</span></p>
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Confirmações') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">$data['confirmacoes_blockchain']}}</span></p>
						{{-- if(count($data['dependencias']) > 0)
							<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Status') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! trataTraducoes('Aprovado') !!} </span></p>
							<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Valor creditado') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;"> currencyToSystemDefaultBD($data['dependencias'][0]['valor']) !!} </span></p>
							<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Hash da transação') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;"> currencyToSystemDefaultBD($data['dependencias'][0]['codigo_transacao']) !!} </span></p>
						else
							<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Status') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! trataTraducoes('Pendente') !!} </span></p>
						endif --}}

					@else
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Valor do pagamento') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! formataMoedaPadraoFormulario($data['valor'],8) !!}</span></p>
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Percentual de encargos') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! $data['porcentagem_plataforma'] !!}</span></p>
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Valor dos encargos') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! formataMoedaPadraoFormulario($data['valor_plataforma'],8) !!}</span></p>
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Total') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! formataMoedaPadraoFormulario($data['total'],8) !!}</span></p>
					@endif
					

					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Data / Hora do início da transação') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! dateTimeBdToApp($data['created_at']) !!}</span></p>
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Data / Hora do término da transação') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! dateTimeBdToApp($data['updated_at']) !!}</span></p>
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