<div class="gray-bg dashbard-1">
    @include('temas.inspinia.navegacaotopo')
    <section class="content" id="destinoHtml" style="margin-top: -20px !important;">
        @yield('content')
    </section>
    <div class="footer" style="position: relative; bottom: 10px;">
        <div class="float-left">
            <a href="/">
                <i class="fa fa-clock-o"></i>
                <span id="tempodesessaorestante"></span>
                {!! trataTraducoes('Tempo de sessão') !!}
                <i class="fa fa-refresh"></i>
            </a>
        </div>
        <div class="float-right">&copy; Copyright {!! date('Y') !!} {!! site_id()['name'] !!} - {!! trataTraducoes('Todos os direitos reservados') !!}</div>
    </div>
</div>
@include('temas.inspinia.menudireita')