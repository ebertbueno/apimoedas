<?php
$dadosUsuarioCompleto = dadosUsuarioCompleto();
?>
<div class="row">
	<div class="col-lg-12">
		<div class="ibox ">
			<div class="ibox-title">
				<h5>{!! $data['titulo'] !!}</h5>
			</div>
			<div class="ibox-content">

				<div class="row">
					<div class="table-responsive">
						<table class="table table-hover margin bottom">
							<thead>
								<tr>
									<th style="width: 5%" class="text-center">#</th>
									<th style="width: 30%">{!! trataTraducoes('campoaqui') !!}</th>
									<th style="width: 30%" class="text-center">{!! trataTraducoes('campoaqui') !!}</th>
									<th style="width: 35%" class="text-right">{!! trataTraducoes('campoaqui') !!} <small>( AUR )</small></th>
								</tr>
							</thead>
							<tbody>
								@foreach( $data['dados'] as $key => $dados )
								<tr>
									<td class="text-center">{!! $key+1 !!}</td>
									<td><small>({!! $dados['QualCarteiraDestino']['moeda_id'] !!}) </small>{!! $dados['QualCarteiraDestino']['nome'] !!}</td>
									<td class="text-center">
										{!! $dados['invoice_id'] !!}
										{!! copiatesteConteudo([
											'conteudo'=>$dados['invoice_id'],
											'texto'=>'hash_da_carteira_copiada_com_sucesso',
											'alinhamento'=>'float-right',
											'label'=>'&nbsp;',
										]) !!}
									</td>
									<td><span class="float-right">{!! currencyToSystemDefaultBD($dados['valor'],8,true) !!}</span></td>
								</tr>
								@endforeach 
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>