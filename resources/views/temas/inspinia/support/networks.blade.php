<link href="/temas/inspinia/css/plugins/dataTables/datatables.min.css?v={!! versaoSistema() !!}" rel="stylesheet">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <h4 style="float: right;">@include('cabecalho')</h4>
                <div class="ibox-title">
                    <h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
                    <div class="ibox-tools" style="padding-right: 20px;">
                        {!! ( !empty($dados['dados']['botoes_da_datatable']) ? $dados['dados']['botoes_da_datatable'] : Null ) !!}
                    </div>
                </div>
                <div class="ibox-content">


                    <div class="row">
                        <div class="col-lg-6">
                            <div id="selected_map"></div>
                        </div>
                        <div class="col-lg-6" style="max-height: 250px !important; overflow: auto !important; margin-top: 50px;">
                            {!! trataTraducoes('campoaqui') !!}
                        </div>
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-hover conteudoDatatable" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
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
    </div>
</div>



<script src="/temas/inspinia/js/plugins/typehead/bootstrap3-typeahead.min.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/d3/d3.min.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/topojson/topojson.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/datamaps/datamaps.all.min.js?v={!! versaoSistema() !!}"></script>

<script>
    $(document).ready(function(){

        var selected_map = new Datamap({
            element: document.getElementById("selected_map"),
            responsive: true,
            fills: {
                defaultFill: "#DBDAD6",
                active: "#2BA587"
            },
            geographyConfig: {
                highlightFillColor: '#1C977A',
                highlightBorderWidth: 0,
            },
            data: {
                @foreach( $dados['paises'] as $paises )
                {!! $paises !!}: { fillKey: "active" },
                @endforeach
            },
            done: function(datamap) {
                datamap.svg.selectAll('.datamaps-subunit').on('click', function(geography) {
                window.location = "/support/stores/filter/" + geography.id;
            });
            }
        });

        orthographic_map.graticule();

        $(window).on('resize', function() {
            setTimeout(function(){
                basic.resize();
                selected_map.resize();
            },100)
        });
    });




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
            'paging': true,
            'pageLength': 10,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': false,
            'autoWidth': false,
            'responsive': true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
            @if( !isset($dados['dados']['botaoPDF']) )
            {extend: 'pdf', title: 'ExampleFile'},
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