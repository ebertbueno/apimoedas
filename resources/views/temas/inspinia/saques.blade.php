<?php
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

<script>
    function calcula_USD_BTC()
    {
        document.getElementById('valor_informado_btc').checked = true;
        var campo_1 = formulario.valor_btc.value;
            campo_1 = campo_1.replace(/[^\d]+/g,"");
        if( !campo_1 ){
            campo_1 = '0.00';
        }
        var campo_2 = '{!! formataMoedaPadraoFormulario(valorBTCAPIS()['valorBTCSaida']) !!}';
        var total = parseInt(campo_1) * parseInt(campo_2);
        var formatado = (total/100000000).toLocaleString("pt-br", { minimumFractionDigits: 2 });

        if ($("#demaior_idade").attr("checked")){
            $("#formulariomaiores").css("display", "block");
        }else{
            $("#formulariomaiores").css("display", "none");
        }

        formulario.valor_usd.value = formatado;
    }

    function calcula_BTC_USD()
    {
        document.getElementById('valor_informado_usd').checked = true;
        var campo_1 = formulario.valor_usd.value;
            campo_1 = campo_1.replace(/[^\d]+/g,"");
        if( !campo_1 ){
            campo_1 = '0.00';
        }
        var campo_2 = '{!! formataMoedaPadraoFormulario(valorBTCAPIS()['valorBTCSaida']) !!}';
        var total = parseInt(campo_1) / parseInt(campo_2);
        var formatado = (total/100).toLocaleString("pt-br", { minimumFractionDigits: 8 });
        formulario.valor_btc.value = formatado;
    }
</script>

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
                    </div>
                </div> 
                <div class="ibox-content">
                    <form name="formulario" id="formulario" action="{!! url($dados['dados']['rota_geral']) !!}" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar.innerHTML='{!! trataTraducoes( !empty($dados['labelFormularioEnviar']) ? $dados['labelFormularioEnviar'] : 'processando' ) !!}', finalizaSummernote()">
                        @csrf
                        {!! montaCamposFormulario(['formulario' => 12,'label' => 'carteira_origem','nome_no_banco_de_dados' => 'carteira_origem','required'=>1,'tipo'=>'select','tabela_relacional'=>'Consulta_Carteiras_Usuario_Apenas_AUR']) !!}

                        {!! montaCamposFormulario(['formulario' => 12,'label' => 'carteira_destino','nome_no_banco_de_dados' => 'carteira_id','required'=>1,'tipo'=>'select','tabela_relacional'=>'Consulta_Carteiras_BTC_Usuario']) !!}

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{!! trataTraducoes('Valor em BTC') !!}</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-12" style="max-width: 47% !important;">
                                        <div class="input-group m-b">
                                            <div class="input-group-append"><span class="input-group-addon"><i class="fa fa-btc"></i></span></div>
                                            <input autocomplete="off" required="required" value="" maxlength="22" name="valor_btc" id="valor_btc" type="text" class="mascaraBTC form-control" min="0" max="1" style="text-align: right;" onkeyup="javascript:calcula_USD_BTC()">
                                            <input type="radio" name="valor_informado" id="valor_informado_btc" value="btc" style="width: 1px !important; height: 1px !important;">
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center" style="max-width: 6% !important; padding: 0px; padding-top: 5px;"><i class="fa fa-arrows-h" style="font-size: 22px;"></i></div>
                                    <div class="col-md-12" style="max-width: 47% !important;">
                                        <div class="input-group m-b">
                                            <input type="radio" name="valor_informado" id="valor_informado_usd" value="aur" style="width: 1px !important; height: 1px !important;">
                                            <input autocomplete="off" required="required" value="" maxlength="22" name="valor_usd" id="valor_usd" type="text" class="mascaraMoeda form-control" min="0" max="1" style="text-align: right;" onkeyup="javascript:calcula_BTC_USD()">
                                            <div class="input-group-prepend"><span class="input-group-addon"><i class="fa fa-usd"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label class="col-sm-2 col-form-label text-right">{!! trataTraducoes('Valor '.strtolower(moeda_usuario())) !!}</label>
                        </div>
                        {!! montaCamposFormulario(['tipo' => 'BotaoModalSalvar','size' => 10,'icone' => 'fa fa-save','titulo' => 'salvar','cor' => 'primary'],'b') !!}
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