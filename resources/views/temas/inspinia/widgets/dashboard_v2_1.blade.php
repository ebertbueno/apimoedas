<div class="ibox ">
	<div class="ibox-title">
		{!! !empty($data['subtitulo']) ? '<span class="label label-'.$data['cor'].' float-right">' : '' !!}
			{!! !empty($data['subtitulo']) ? $data['subtitulo'] : '' !!}
		{!! !empty($data['subtitulo']) ? '</span>' : '' !!}
		<h5>{!! !empty($data['titulo']) ? $data['titulo'] : '' !!}</h5>
	</div>
	<div class="ibox-content">
		<h3 class="no-margins">{!! !empty($data['valor']) ? $data['valor'] : '' !!}</h3>
		@if(!empty($data['porcentagem']))
		<div class="stat-percent font-bold text-success">{!! $data['porcentagem'] !!}
			@if(!empty($data['icone']))
			<i class="{!! $data['icone'] !!}"></i>
			@endif
		</div>
		@endif
		@if(!empty($data['subtexto']))
		<small>{!! $data['subtexto'] !!}</small>
		@endif
	</div>
</div>