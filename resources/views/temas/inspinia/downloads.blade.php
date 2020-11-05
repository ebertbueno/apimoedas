<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <h4 style="float: right;">@include('cabecalho')</h4>
                <div class="ibox-title">
                    <h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
                </div>
                <div class="ibox-content">
                    <div align="center">
                        <button class="btn btn-default filter-button" data-filter="all">{!! trataTraducoes('Todos os tipos') !!}</button>
                        @foreach( $dados['extensoes'] as $key => $extensoes )
                        <button class="btn btn-default filter-button" data-filter="{!! strtoupper($extensoes) !!}">{!! strtoupper($extensoes) !!}</button>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-sm-12">&nbsp;</div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                @foreach( $dados['data'] as $data )
                                <?php
                                    $qualFormato = explode('.',$data['arquivo']);
                                    $qualFormato = $qualFormato[count($qualFormato)-1];
                                ?>
                                    <div class="file-box filter {!! strtoupper($qualFormato) !!}" style="width: 50% !important; float: left !important;">
                                        <div class="file">
                                            <a href="{!! $data['arquivo'] !!}" download="{!! $data['nome'] !!}" target="_blank">
                                                <span class="corner"></span>
                                                <div class="icon">
                                                    <i class="{!! iconePorFormatodeArquivo($data['arquivo']) !!}"></i>
                                                </div>
                                                <div class="file-name">{!! $data['arquivo'] !!}</div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){

        $(".filter-button").click(function(){
            var value = $(this).attr('data-filter');
            if(value == "all"){
                $('.filter').show('1000');
            } else {
                $(".filter").not('.'+value).hide('3000');
                $('.filter').filter('.'+value).show('3000');
            }
        });
        if ($(".filter-button").removeClass("active")) {
            $(this).removeClass("active");
        }
        $(this).addClass("active");
    });
</script>