@extends('temas.inspinia.layout')
@section('content')

<link href="/temas/inspinia/css/plugins/dataTables/datatables.min.css?v={!! versaoSistema() !!}" rel="stylesheet">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title" style="padding: 10px 33px 10px 33px">
                    @include('cabecalho')
                    <div class="row" style="padding: 0px">
                        <div class="col-md-6">
                            <h5 style=" padding: 5px 0px 0px 0px;">{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
                            <div class="ibox-tools" style="padding-right: 20px;">
                                {!! ( !empty($dados['dados']['botoes_da_datatable']) ? $dados['dados']['botoes_da_datatable'] : Null ) !!}
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            @if(!empty($dados['dados']['botao_datatable_padrao']))
                            <a href="{!! $dados['dados']['titulo_pagina'] !!}/create">
                                <li class="btn btn-primary btn-xs float-right">
                                    <i class="fa fa-plus"></i> {!! trataTraducoes('Adicionar novo') !!}
                                </li>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-hover conteudoDatatable" cellpadding="0" cellspacing="0" border="0">
                            <thead>
                                @if( !empty($dados['dados']['formulario_adicional']) )
                                @include('temas.inspinia.'.$dados['dados']['formulario_adicional'], ['tamanho' => count($dados['datatable'])])
                                @endif
                                <tr>
                                    @foreach( $dados['datatable'] as $key => $datatable )
                                    <th style="width:{!! $datatable['tabela'] !!}%">{!! trataTraducoes($datatable['label']) !!}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    @foreach( $dados['datatable'] as $key => $datatable )
                                    <th>{!! trataTraducoes($datatable['label']) !!}</th>
                                    @endforeach
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var tabela;
    $(document).ready(function(){
        tabela = $('.conteudoDatatable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.18/i18n/Portuguese-Brasil.json"
            },
            "ajax": {
                "url": "{!! url($dados['dados']['rota_geral']).'/show' !!}",
                "type": "GET"
            },
            "columns": [
            @foreach( $dados['datatable'] as $campos )
            {"data": "{!! $campos['nome_no_banco_de_dados'] !!}" },
            @endforeach
            ],
            'paging': {!! ( isset($dados['dados']['paging']) ? 'false' : 'true' ) !!},
            'pageLength': {!! ( isset($dados['dados']['pageLength']) ? $dados['dados']['pageLength'] : 25 ) !!},
            'lengthChange': {!! ( isset($dados['dados']['lengthChange']) ? 'false' : 'true' ) !!},
            'searching': {!! ( isset($dados['dados']['searching']) ? 'false' : 'true' ) !!},
            'ordering': {!! ( isset($dados['dados']['ordering']) ? 'false' : 'true' ) !!},
            'info': {!! ( isset($dados['dados']['info']) ? 'true' : 'false' ) !!},
            'autoWidth': false,
            'responsive': {!! ( isset($dados['dados']['responsive']) ? 'false' : 'true' ) !!},
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [

            @if( !isset($dados['dados']['botaoPDF']) )
            {extend: 'pdf', title: '{!! urlCompleta() !!}'},
            @endif

            @if( !isset($dados['dados']['botaoExcel']) )
            {extend: 'excel', title: '{!! urlCompleta() !!}'},
            @endif

            @if( !isset($dados['dados']['botaoImprimir']) )
            {extend: 'print',
            customize: function (win){
                $(win.document.body).addClass('white-bg');
                $(win.document.body).css('font-size', '10px');
                $(win.document.body).find('table')
                .addClass('compact')
                .css('font-size', 'inherit');
            }
        }
        @endif
        ]
    });
    });
</script>

<script src="/temas/inspinia/js/plugins/dataTables/datatables.min.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js?v={!! versaoSistema() !!}"></script>

@endsection