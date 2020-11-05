<link href="/temas/inspinia/css/plugins/codemirror/codemirror.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/css/plugins/codemirror/ambiance.css?v={!! versaoSistema() !!}" rel="stylesheet">

<div class="wrapper wrapper-content animated fadeInRight" style="left: 0px !important; right: 0px !important; width: 100% !important; position: relative !important; overflow-x: hidden !important;">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <h4 style="float: right;">@include('cabecalho')</h4>
                <div class="ibox-title">
                    <h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
                    <div class="ibox-tools">
                        {!! ( !empty($dados['dados']['botoes_da_datatable']) ? $dados['dados']['botoes_da_datatable'] : Null ) !!}
                    </div>
                </div>
                <div class="ibox-content">
                    @include('temas.inspinia.correio_interno_leitura')
                </div>
            </div>
        </div>
    </div>
</div>

<div style="padding-right: 2px; width: 100%; float: left; display: none;">
    <div class="progress">
        <div class="bar"></div>
        <div class="percent"></div >
    </div>
</div>
<div id="status"></div>

<script src="/js/jquery.form.js"></script>
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