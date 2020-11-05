@extends('temas.inspinia.layout')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">

                <h4 style="float: right;">
                    <a href="/" style="cursor: pointer;">
                        <span class="nav-label">Atualizar página</span>
                    </a>
                </h4>
                <div class="ibox-title">
                    <h5>{!! trataTraducoes('Início') !!}</h5>
                </div>

                <div class="ibox-content">
                    <div class="table-responsive">
                        Dashboard de Administrador
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection