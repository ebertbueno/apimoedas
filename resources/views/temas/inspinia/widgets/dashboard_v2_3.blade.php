<?php
$totalMensagens = count($data['data']);
?>
<div class="col-lg-12" style="padding: 0px;">
	<div class="ibox ">
		<div class="ibox-title">
			<h5>{!! $data['titulo'] !!}</h5>
			<div class="ibox-tools">
				<a class="collapse-link">
					<i class="fa fa-chevron-up"></i>
				</a>
			</div>
		</div>
		<div class="ibox-content ibox-heading">
			<h3><i class="fa fa-envelope-o"></i> {!! $totalMensagens !!} {!! $data['subtitulo'] !!}</h3>
		</div>
		<div class="ibox-content">
			<div class="feed-activity-list" style="height: 50vh; overflow: auto;">

				@forelse( $data['data'] as $key => $dados )
				<div class="feed-element">
					<div>
						<small class="float-right text-navy">{!! $dados['created_at'] !!}</small>
						<strong>{!! $dados['nomeRemetente']['name'] !!}</strong>
						<div>{!! $dados['assunto'] !!}</div>
					</div>
				</div>
				@empty
				<div>
					{!! $data['texto_sem_mensagem'] !!}
				</div>
				@endforelse

			</div>
		</div>
	</div>
</div>