<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <h4 style="float: right;">@include('cabecalho')</h4>
                <div class="ibox-title">
                    <h5>montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
                    <div class="ibox-tools" style="padding-right: 20px;">
                        ( !empty($dados['dados']['botoes_da_datatable']) ? $dados['dados']['botoes_da_datatable'] : Null ) !!}
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-hover conteudoDatatable" cellpadding="0" cellspacing="0" border="0">
                            <thead>
                                <tr>
                                    <th style="width:$datatable['tabela'] !!}%">trataTraducoes($datatable['label']) !!}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>trataTraducoes($datatable['label']) !!}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>