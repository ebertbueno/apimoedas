<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <h4 style="float: right;">@include('cabecalho')</h4>
                <div class="ibox-title">
                    <h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
                    <div class="ibox-tools" style="padding-right: 5px;">
                        {!! $dados['dados']['botoes_da_datatable_voltar'] !!}
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-sm-12">
                            <h2>{!! $dados['data']['qualUsuario']['name'] !!} <h4>{!! $dados['data']['qualUsuario']['email'] !!}</h4></h2>
                            <div class="row"><div class="col-sm-12">&nbsp;</div></div>


                            
                            @foreach( $dados['data']['rastroTicket'] as $key => $rastroTicket )
                            <div class="row" style="padding-left: 25px;">
                                @if( $rastroTicket['qualUsuario']['nivel'] != 'cli' )
                                <div class="col-sm-1">&nbsp;</div>
                                @endif
                                <div class="col-sm-11 {!! ( $rastroTicket['qualUsuario']['nivel'] === 'cli' ? 'lazur-bg' : 'navy-bg' ) !!}">
                                    <div class="row"><div class="col-sm-12">&nbsp;</div></div>
                                    <h2 style="line-height: 5px">{!! $rastroTicket['qualUsuario']['name'] !!} <h4>{!! $rastroTicket['qualUsuario']['email'] !!}</h4></h2>
                                    <hr>
                                    {!! $rastroTicket['mensagem'] !!}
                                    @if( count($rastroTicket['anexosAndamento']) > 0 )
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm">
                                            @foreach( $rastroTicket['anexosAndamento'] as $anexos )
                                            <div class="file-box">
                                                <div class="file">
                                                    <a href="{!! $anexos['arquivo'] !!}" target="_blank">
                                                        <span class="corner"></span>
                                                        <div class="icon">
                                                            @if( iconePorFormatodeArquivo($anexos['arquivo']) === 'fa fa-picture-o' )
                                                            <img src="{!! $anexos['arquivo'] !!}" class="img-responsive" style="max-width: 100% !important; height: auto !important;">
                                                            @else
                                                            <i class="{!! iconePorFormatodeArquivo($anexos['arquivo']) !!}"></i>
                                                            @endif
                                                        </div>
                                                        <div class="file-name text-center">
                                                            <i class="fa fa-eye"></i> {!! trataTraducoes('Abrir') !!}
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    <div class="row"><div class="col-sm-12">&nbsp;</div></div>
                                </div>
                            </div>
                            <div class="row"><div class="col-sm-12">&nbsp;</div></div>
                            @endforeach



                        </div>
                    </div>


                    @if( consultaStausTicket($dados['data']['id'])['status'] != 9 )
                    <div class="ibox-content">
                        <form name="formulario" id="formulario" action="{!! url($dados['dados']['rota_geral']) !!}" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar.disabled=true, this.botaoEnviar.innerHTML='{!! trataTraducoes('Enviando') !!}', finalizaSummernote()">
                            @csrf
                            @foreach( $dados['formulario'] as $formulario )
                            {!! $formulario !!}
                            @endforeach

                            <script src="/temas/inspinia/js/plugins/summernote/summernote-bs4.js"></script>
                            <script src="/temas/inspinia/js/popper.min.js"></script>
                            <script src="/temas/inspinia/js/bootstrap.js"></script>
                            <script>$(document).ready(function(){$('.summernote').summernote();});</script>
                        </form>
                        @include('temas.inspinia.formulario_rodape')
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
                    @endif



                </div>
            </div>
        </div>
    </div>
</div>