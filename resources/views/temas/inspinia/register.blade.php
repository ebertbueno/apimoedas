@extends('temas.inspinia.layout_login')
@section('content')

<?php
$idiomas = pegaIdiomasDisponiveis();
?>

<div class="animated fadeInDown">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox-content">
                <div class="col-lg-12">
                    <h3>{!! trataTraducoes('Novo registro') !!}</h3>

                    @include('temas.inspinia.mostra_erros')

                    <form class="m-t" role="form" name="formulario" id="formulario" action="/register" method="post" onsubmit="return this.botaoEnviar.disabled=true">
                        @csrf
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="{!! trataTraducoes('Senha') !!}" required="">
                        </div>

                        <button type="submit" class="btn btn-primary block full-width m-b">{!! trataTraducoes('Registrar') !!}</button>

                        <p class="text-muted text-center"><small>{!! trataTraducoes('Já possui uma conta?') !!}</small></p>
                        <a class="btn btn-sm btn-white btn-block" href="/login"> <i class="fa fa-sign-in"> </i> {!! trataTraducoes('Entrar') !!}</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection