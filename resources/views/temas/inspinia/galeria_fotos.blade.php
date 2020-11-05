<link href="/temas/inspinia/css/plugins/dataTables/datatables.min.css?v={!! versaoSistema() !!}" rel="stylesheet">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <h4 style="float: right;">@include('cabecalho')</h4>
                <div class="ibox-title">
                    <h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
                    <div class="ibox-tools" style="padding-right: 5px;">
                        {!! $dados['dados']['botoes_da_datatable'] !!}
                    </div>
                </div>
                <div class="ibox-title">
                    <form name="formulario" id="formulario" action="{!! url($dados['dados']['rota_geral']) !!}" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar.disabled=true, finalizaSummernote()">
                        @csrf
                        {!! $dados['formulario'] !!}
                    </form>
                    @include('temas.inspinia.formulario_rodape')

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div style="width: 100%;">
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
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm">One of five columns</div>
                        <div class="col-sm">Two of five columns</div>
                        <div class="col-sm">Three of five columns</div>
                        <div class="col-sm">Four of five columns</div>
                        <div class="col-sm">Five of five columns</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>