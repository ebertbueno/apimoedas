@extends('temas.inspinia.layout_login')
@section('content')
<div class="animated fadeInDown">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox-content">
                <h2 class="font-bold">{!! trataTraducoes('Entrar') !!}</h2>
                <p>{!! trataTraducoes('Informe suas credenciais para acessar a plataforma!') !!}</p>
                @include('temas.inspinia.mostra_erros')
                <div class="row">
                    <div class="col-lg-12">
                        <form name="formulario" id="formulario" action="/login" method="post" onsubmit="return this.botaoEnviar.disabled=true," class="text-right">
                            @csrf
                            <div class="form-group">
                                <input autofocus="autofocus" type="email" name="email" class="form-control" placeholder="{!! trataTraducoes('Email') !!}" required="" value="{!! session('email') ? session('email') : '' !!}">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="{!! trataTraducoes('Senha') !!}" required="" value="">
                            </div>
                            <button type="submit" class="btn btn-primary block full-width m-b"> <i class="fa fa-sign-in"> </i> {!! trataTraducoes('Entrar') !!}</button>
                            <a href="/forgot_password">{!! trataTraducoes('Esqueci minha senha') !!}</a>
                            <hr />
                            <a class="btn btn-sm btn-white btn-block" href="/register">{!! trataTraducoes('Criar nova conta') !!}</a>
                        </form>
                        @include('temas.inspinia.formulario_rodape')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    if ("serviceWorker" in navigator) {
        navigator.serviceWorker
        .register("/clientes/{!! site_id()['id'] !!}/pwa/service-worker.js")
        .then(function (reg) {
            console.log("[PWA Builder] Service worker has been registered for scope: " + reg.scope);
        });
    }else{
        console.log('Else service woerker')
    }
</script>

@endsection