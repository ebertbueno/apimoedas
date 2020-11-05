@extends('temas.inspinia.layout_login')
@section('content')

<div class="passwordBox animated fadeInDown">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox-content">
                <div class="col-lg-12">
                    <form class="m-t" role="form" name="formulario" id="formulario" action="/reset_pin" method="post" onsubmit="return this.botaoEnviar.disabled=true">
                        @csrf
                        <h2 class="font-bold text-center">{!! trataTraducoes('Confirma troca da senha PIN') !!}</h2>
                        <div class="form-group">
                            {!! trataTraducoes('campoaqui') !!}
                        </div>

                        @include('temas.inspinia.mostra_erros')
                        <div class="form-group">
                            <input autofocus="autofocus" type="email" name="email" class="form-control" placeholder="{!! trataTraducoes('Email') !!}" required="" value="{!! session('email') ? session('email') : '' !!}">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="{!! trataTraducoes('Senha') !!}" required="">
                        </div>

                        <input type="hidden" name="hash" readonly="readonly" class="form-control" value="{!! $data['hash_confirma'] !!}">
                        <button type="submit" class="btn btn-primary block full-width m-b"> <i class="fa fa-check"> </i> {!! trataTraducoes('Confirmar troca da senha PIN') !!}</button>
                    </form>

                    <br>

                    <p class="text-center">
                        <form class="m-t" role="form" name="formulario" id="formulario" action="/reset_pin" method="post" onsubmit="return this.botaoEnviar.disabled=true">
                            @csrf
                            <input type="hidden" name="hash" readonly="readonly" class="form-control" value="{!! $data['hash_nega'] !!}">
                            <button type="submit" class="btn btn-link block full-width m-b text-danger"> <i class="fa fa-times"> </i> {!! trataTraducoes('Não solicitei a troca da senha') !!}</button>
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection