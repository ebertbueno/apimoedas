<?php

$corCamera = '#4d4d4d';

/*
@extends('temas.inspinia.layout')
@section('content')
*/
?>

{!! !empty($dados['dados']['javascript']) ? $dados['dados']['javascript'] : Null !!}

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
                <div class="ibox-title">
                    <h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
                    <div class="ibox-tools" style="padding-right: 5px;">
                        <a class="btn-apagar btn btn-warning btn-xs float-right" data-toggle="tooltip" data-placement="top" style="margin: 0px 2px;" onclick="montaTela('{!! $dados['dados']['rota_geral'] !!}');finalizaSummernote();" title="{!! trataTraducoes('Voltar') !!}">
                            <i class="fa fa-list" style="color: #fff"> </i> <span style="color: #fff">{!! trataTraducoes('Voltar para a listagem') !!}</span>
                        </a>
                        {!! montaCamposFormulario(['cor'=>'primary','url'=>'/financial/payments/create/paste','tipo'=>'LinkGeralIcone','label'=>'novo_pagamento_por_codigo_de_transacao',],'b') !!}
                    </div>
                </div>
                <div class="ibox-content">
                    @include('cameraQRcode')
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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
</script>

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