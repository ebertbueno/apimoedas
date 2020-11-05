<?php
/*
// @extends('temas.inspinia.layout')
// @section('content')
extends('temas.inspinia.layout_valida_conta')
*/
?>

<link href="/temas/inspinia/css/plugins/summernote/summernote-bs4.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/css/plugins/chosen/bootstrap-chosen.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/css/style.css?v={!! versaoSistema() !!}" rel="stylesheet">
<script src="/temas/inspinia/js/jquery-3.1.1.min.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/chosen/chosen.jquery.js?v={!! versaoSistema() !!}"></script>
<script src="/js/jquery.mask.js?v={!! versaoSistema() !!}"></script>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <h4 style="float: right;">@include('cabecalho')</h4>
                <div class="ibox-title text-left">
                    <h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
                    <div class="ibox-tools" style="padding-right: 5px;">
                        <a class="btn-apagar btn btn-warning btn-xs float-right" data-toggle="tooltip" data-placement="top" style="margin: 0px 2px;" onclick="montaTela('{!! ( !empty($dados['dados']['rota_geral_voltar']) ? $dados['dados']['rota_geral_voltar'] : $dados['dados']['rota_geral'] ) !!}');" title="{!! trataTraducoes('Voltar') !!}">
                            <i class="fa fa-list" style="color: #fff"></i><span style="color: #fff">{!! trataTraducoes('Voltar para a listagem') !!}</span>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form name="formulario" id="formulario" action="{!! url($dados['dados']['rota_geral']) !!}" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar.innerHTML='{!! trataTraducoes( !empty($dados['labelFormularioEnviar']) ? $dados['labelFormularioEnviar'] : 'processando' ) !!}',">

                        @csrf

                        <?php
                        $inicial = 1;
                        $qdadeTelefone = 4;
                        while($inicial <= $qdadeTelefone){

                            $telefoneCompleto = '';
                            $foneatual = explode(' ',dadosUsuarioCompleto()['fone_'.$inicial.'']);
                            for ($i = 1; $i < count($foneatual); $i++){
                                $telefoneCompleto .= $foneatual[$i] . ' ';
                            }
                            ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group m-b">
                                        <div class="input-group-prepend">
                                            <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button" aria-expanded="false" style="width: 7vw !important"><img width="20" id="principal{!!$inicial!!}" src="{!! verificaBandeira( str_replace('+','',$foneatual)[0] ) !!}"></button>
                                            <ul class="dropdown-menu" x-placement="bottom-start" style="overflow:auto; height:20vh; left: 0px;" id="countryList{!!$inicial!!}">
                                                <input autocomplete="off" type="text" id="filterCountry{!!$inicial!!}" onkeyup="myFunction{!!$inicial!!}()" class="form-control" placeholder="{!! trataTraducoes('Filtre por país') !!}">
                                                <input type="hidden" value="{!! $foneatual[0] !!}" id="pais{!!$inicial!!}" name="pais{!!$inicial!!}">
                                                @foreach($paises as $p)
                                                <li onclick="populaCampo{!!$inicial!!}('{{ $p->bandeira }}'); populaid{!!$inicial!!}('{{ $p->ddi }}')">
                                                    <a style="cursor: pointer;">
                                                        <div class="row">
                                                            <div class="col-lg-2">+{{$p->ddi}}</div>
                                                            <div class="col-lg-8">{{$p->nome}}</div>
                                                            <div class="col-lg-2"><img width="20" src="{{$p->bandeira}}"></div>
                                                        </div>
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <input type="text" value="{!! $telefoneCompleto !!}" name="fone_{!!$inicial!!}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <?php
                            $inicial++;
                        }
                        ?>

                        {!! $dados['formulario'][0] !!}

                        <script src="/temas/inspinia/js/popper.min.js?v={!! versaoSistema() !!}"></script>
                        <script src="/temas/inspinia/js/bootstrap.js?v={!! versaoSistema() !!}"></script>
                        <script src="/temas/inspinia/js/plugins/summernote/summernote-bs4.js?v={!! versaoSistema() !!}"></script>
                    </form>
                    @include('temas.inspinia.formulario_rodape')
                </div>
            </div>
        </div>
    </div>
</div>

{!! !empty($dados['dados']['javascript']) ? $dados['dados']['javascript'] : Null !!}

<link href="/temas/inspinia/css/plugins/summernote/summernote-bs4.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/css/plugins/chosen/bootstrap-chosen.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/css/style.css?v={!! versaoSistema() !!}" rel="stylesheet">
<script src="/temas/inspinia/js/jquery-3.1.1.min.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/chosen/chosen.jquery.js?v={!! versaoSistema() !!}"></script>
<script src="/js/jquery.mask.js?v={!! versaoSistema() !!}"></script>

<script type="text/javascript">
    @for($i = 1; $i <= $qdadeTelefone; $i++)
    function populaCampo{!! $i !!}(url){
        var img = document.getElementById('principal{!! $i !!}');
        img.src = url;
    }

    function populaid{!! $i !!}(id){
        document.getElementById('pais{!! $i !!}').value=id;
    }
    @endfor
</script>

{{-- <script>
    $(document).ready(function(){

        $('.mascaraData').mask('11/11/1111');
        $('.mascaraTempo').mask('00:00:00');
        $('.mascaraDataTempo').mask('00/00/0000 00:00:00');
        $('.mascaraCep').mask('00000-000');
        $('.mascaraTelefone4').mask('0000-0000');
        $('.mascaraTelefone4DDD').mask('(00) 0000-0000');
        $('.mascaraTelefoneUS').mask('(000) 000-0000');
        $('.mascaraMixed').mask('AAA 000-S0S');
        $('.mascaraCPF').mask('000.000.000-00', {reverse: true});
        $('.mascaraMoeda').mask('000.000.000.000.000.00', {reverse: true});
        $('.mascaraBTC').mask('000.000.000.000.000.00000000', {reverse: true});
    });
</script> --}}

<div style="padding-right: 2px; width: 100%; float: left; display: none;">
    <div class="progress">
        <div class="bar"></div>
        <div class="percent"></div >
    </div>
</div>
<div id="status"></div>

<script src="/js/jquery.form.js?v={!! versaoSistema() !!}"></script>
<script>
    (function() {
        var status = $('#status');
        $('form').ajaxForm({
            beforeSend: function() {
                status.empty();
            },
            success: function() {
            },
            complete: function(xhr) {
                status.html(xhr.responseText);
            }
        }); 
    })();
</script>

<script>
    <?php
    $inicial = 1;

    while($inicial <= $qdadeTelefone){
        ?>
        function myFunction{!!$inicial!!}() {
            var input, filter, table, tr, td, i, div, strong, h1, h2, h3, h4, h5, h6, p, abbr, txtValue;
            input = document.getElementById("filterCountry{!!$inicial!!}");
            filter = input.value.toUpperCase();
            table = document.getElementById("countryList{!!$inicial!!}");
            tr = table.getElementsByTagName("li");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("a")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }       
            }
        }
        <?php
        $inicial++;
    }
    ?>
</script>