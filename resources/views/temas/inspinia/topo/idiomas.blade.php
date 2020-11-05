<li class="dropdown">
	<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" title="{!! trataTraducoes('Idiomas') !!}">
		<i class="fa fa-language"></i> 
	</a>
	<ul class="dropdown-menu dropdown-alerts">
		<li>
			<a class="dropdown-item">
				<div>
					<h3> <i class="fa fa-language fa-fw"></i>{!! trataTraducoes('Idiomas') !!}</h3>
				</div>
			</a>
		</li>
		<li class="dropdown-divider"></li>
		@foreach( pegaIdiomasDisponiveis() as $idiomas )
		<li>
			<a href="/translations/changeLanguage/{!! $idiomas['url'] !!}" style="cursor: pointer;" class="dropdown-item">
				<div>
					 <img src="{!! $idiomas['imagem'] !!}"> {!! strtoupper($idiomas['sigla']) !!} - {!! trataTraducoes($idiomas['sigla']) !!}
				</div>
			</a>
		</li>
		@if (!$loop->last)
		<li class="dropdown-divider"></li>
		@endif
		@endforeach
	</ul>
</li>