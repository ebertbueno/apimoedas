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


<script src="/js/jquery.mask.js?v={!! versaoSistema() !!}"></script>
<div id="formularioSobreposto">
    <div class="wrapper wrapper-content animated fadeIn" style="margin-top: -160px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-content">
                        <form name="formulario" id="formulario" action="{!! url($dados['dados']['rota_geral']) !!}" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar.disabled=true, this.botaoEnviar.innerHTML='{!! trataTraducoes('Enviando') !!}', finalizaSummernote()">
                            @csrf
                            @foreach( $dados['formulario'] as $formulario )
                            {!! $formulario !!}
                            @endforeach

                            <script src="/temas/inspinia/js/popper.min.js?v={!! versaoSistema() !!}"></script>
                            <script src="/temas/inspinia/js/bootstrap.js?v={!! versaoSistema() !!}"></script>
                            <script src="/temas/inspinia/js/plugins/summernote/summernote-bs4.js?v={!! versaoSistema() !!}"></script>
                            <script>
                                $(document).ready(
                                    function(){
                                        $('.summernote').summernote({
                                            height: 200,
                                        });
                                    });
                            </script>
                        </form>
                        @include('temas.inspinia.formulario_rodape')
                    </div>
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
        $('.mascaraBTC').mask('000.000.000.000.00000000', {reverse: true});
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