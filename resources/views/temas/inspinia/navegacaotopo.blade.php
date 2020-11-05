<div class="row border-bottom">
	<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<a class="navbar-minimalize minimalize-styl-2 btn btn-primary text-white" style="cursor: pointer;"><i class="fa fa-bars"></i> </a>
		</div>
		<a style="padding-top: 20px; padding-right: 30px;" onclick="ajaxGlobal()" class="cursor_pointer"> 
			{!! trataTraducoes('Bem vindo') !!} - {!! explode(' ',Auth()->user()->name)[0] !!} 
			@if( Auth()->user()->nivel === 'cli' )
			@if( !is_null(dadosUsuarioCompleto()['termos_e_condicoes']) )
			<span id="saldoDisponivelDestino">...</span>
			@else
			<br>{!! trataTraducoes('Confirmo estar ciente e aceito os tempos de condições') !!}
			@endif
			@endif
		</a>
		<ul class="nav navbar-top-links navbar-right botoesAdicionaisResponsivo">
			@if( !is_null(dadosUsuarioCompleto()['termos_e_condicoes']) )
			<li class="botoesAdicionaisResponsivoInterno"></li>
			@include('temas.inspinia.topo.alertas')
			@include('temas.inspinia.topo.chat')
			@include('temas.inspinia.topo.ticket')
			@include('temas.inspinia.topo.correio_interno')
			@include('temas.inspinia.topo.idiomas')
			@endif
			<li class="botoesAdicionaisResponsivoBotoes"><a href="/sair" title="{!! trataTraducoes('Sair') !!}"><i class="fa fa-power-off"></i></a></li>
		</ul>
	</nav>
</div>