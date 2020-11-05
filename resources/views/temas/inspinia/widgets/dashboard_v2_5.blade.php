<?php
$dadosUsuarioCompleto = dadosUsuarioCompleto();
?>
<div class="row">
	<div class="col-lg-12">
		<div class="ibox ">
			<div class="ibox-title">
				<h5>{!! $data['titulo'] !!}</h5>
				@if( !is_null(dadosUsuarioCompleto()['termos_e_condicoes']) )
				<div class="ibox-tools">
					@if( consultaCarteirasdoUsuarioSaldoNegativo() === 0 )
					<a onclick="montaTela('/registrations/wallet/create')" class="btn btn-primary btn-xs">
						<i class="fa fa-plus"></i> {!! trataTraducoes('campoaqui') !!}
					</a>
					@endif
				</div>
				@endif
			</div>
			<div class="ibox-content">

				<div class="row">
					<div class="table-responsive">
						<table class="table table-hover margin bottom">
							<thead>
								<tr>
									<th style="width: 2%" class="text-center">#</th>
									<th style="width: 20%">{!! trataTraducoes('campoaqui') !!}</th>
									<th style="width: 15%" class="text-center">{!! trataTraducoes('campoaqui') !!}</th>
									<th style="width: 23%" class="text-center">{!! trataTraducoes('campoaqui') !!}</th>
									<th style="width: 20%" class="text-right">{!! trataTraducoes('campoaqui') !!} <small>( AUR )</small></th>
									<th style="width: 20%" class="text-right">{!! trataTraducoes('campoaqui') !!} <small>( USD )</small></th>
								</tr>
							</thead>
							<tbody>
								@php
								$totalSomado = 0;
								@endphp 
								@foreach( $data['dados'] as $key => $dados )
								<tr>
									<td class="text-center">{!! $key+1 !!}</td>
									<td><small>({!! $dados['moeda_id'] !!}) </small>{!! $dados['nome'] !!}</td>
									<td class="text-center">{!! $dados['moeda_id'] !!}</td>
									<td class="text-center">
										{!! $dados['hash'] !!}
										{!! copiatesteConteudo([
											'conteudo'=>$dados['hash'],
											'texto'=>'hash_da_carteira_copiada_com_sucesso',
											'alinhamento'=>'float-right',
											'label'=>'&nbsp;',
										]) !!}
									</td>
									<td><span class="float-right">{!! number_format(currencyToSystemDefaultBD($dados['SaldoConta']['saldo_disp'],2),2) !!}</span></td>
									<td><span class="float-right">{!! number_format(currencyToSystemDefaultBD($dados['SaldoConta']['saldo_disp']*configuracoesPlataforma()['valor_moeda_padrao_referente_dolar'],2),2) !!}</span></td>
								</tr>
								@php
								$totalSomado = $totalSomado + $dados['SaldoConta']['saldo_disp'];
								@endphp
								@endforeach 
								<tr>
									<td>&nbsp;</td>
									<td colspan="3">{!! trataTraducoes('total_somado') !!}</td></td>
									<td class="text-right">{!! number_format(currencyToSystemDefaultBD($totalSomado,2),2) !!}</td>
									<td class="text-right">{!! number_format(currencyToSystemDefaultBD($totalSomado*configuracoesPlataforma()['valor_moeda_padrao_referente_dolar'],2),2) !!}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>