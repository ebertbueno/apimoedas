<div id="wrapper">
    @include('temas.inspinia.menu')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        @include('temas.inspinia.navegacaotopo')
        <section class="content" id="destinoHtml" style="margin-top: -20px !important;">
            @yield('content')
        </section>
        <div class="footer">
            <div class="float-right">&copy; Copyright {!! date('Y') !!} {!! site_id()['name'] !!} - {!! trataTraducoes('Todos os direitos reservados') !!}</div>
        </div>
    </div>
    @include('temas.inspinia.menudireita')
</div>