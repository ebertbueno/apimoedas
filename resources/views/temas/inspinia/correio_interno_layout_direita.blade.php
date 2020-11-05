<div class="tab-content">
    @forelse( $dadosLoopInterno as $tipo => $tipo )
        @foreach( $dadosLoopInterno[$tipo] as $key => $data )
            <div id="tab-{!! $tipo !!}-{!! $key !!}" class="tab-pane">
                @include('temas.inspinia.correio_interno_botoes')
                <div class="small text-muted">
                    <i class="fa fa-clock-o"></i>{!! dateTimeBdToApp($data['created_at']) !!}
                </div>
                <h1>{!! $data['assunto'] !!}</h1>
                <p>{!! $data['mensagem'] !!}</p>
                @forelse( $data['Anexos'] as $key => $anexos )
                <div class="m-t-lg">
                    <p>
                        <span><i class="fa fa-paperclip"></i> {!! count($dados['enviados']['Anexos']) !!} {!! trataTraducoes('Anexos') !!} - </span>
                        <a href="#">{!! trataTraducoes('Baixar todos') !!}</a>
                    </p>
                    <div class="attachment">
                        {!! verificaTipoArquivo('aquivo.png',1) !!}
                        <div class="clearfix"></div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        @endforeach
    @empty
    <p class="text-center">{!! trataTraducoes('Sem mensagens') !!}</p>
    @endforelse
</div>




<?php
/*

<div class="tab-content">
    @forelse( $dadosLoop[$tipo] as $key => $data )
    <div id="tab-{!! $tipo !!}-{!! $key !!}" class="tab-pane {!! $key === 0 ? 'active show' : '' !!}">
        @include('temas.inspinia.correio_interno_botoes')
        <div class="small text-muted">
            <i class="fa fa-clock-o"></i>{!! dateTimeBdToApp($data['created_at']) !!}
        </div>
        <h1>{!! $data['assunto'] !!}</h1>
        <p>{!! $data['mensagem'] !!}</p>
        @forelse( $data['Anexos'] as $key => $anexos )
        <div class="m-t-lg">
            <p>
                <span><i class="fa fa-paperclip"></i> {!! count($dados['enviados']['Anexos']) !!} {!! trataTraducoes('Anexos') !!} - </span>
                <a href="#">{!! trataTraducoes('Baixar todos') !!}</a>
            </p>
            <div class="attachment">
                {!! verificaTipoArquivo('aquivo.png',1) !!}
                <div class="clearfix"></div>
            </div>
        </div>
        @empty
        @endforelse
    </div>
    @empty
    <p class="text-center">{!! trataTraducoes('Sem mensagens') !!}</p>
    @endforelse
</div>

*/
?>