@extends('temas.inspinia.layout_login')
@section('content')

<meta http-equiv="refresh" content="3; URL='{!! url('/') !!}'"/>

<div class="passwordBox animated fadeInDown" style="width: 100% !important;">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox-content">
                <div class="col-lg-12">
                    <h3>{!! trataTraducoes('Registro efetuado com sucesso') !!}</h3>
                    @include('temas.inspinia.mostra_erros')

                    {!! trataTraducoes('campoaqui') !!}
                    <br><br>
                    <a href="{!! url('/') !!}">{!! trataTraducoes('Clique aqui') !!}</a> {!! trataTraducoes('campoaqui') !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection