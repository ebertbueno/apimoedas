@extends('temas.inspinia.layout')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">

    teste - {!! app()->getLocale() !!}

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
                    <?php
                    /*
                    <div class="ibox-tools" style="padding-right: 20px;">
                         Cópia original em home.blade.txt
                    </div>
                    */
                    ?>
                </div>

                <div class="ibox-content">
                    <div class="table-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection