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
                <div class="table-responsive">




                    @foreach( websiteFAQ() as $key => $faq )
                    <div class="faq-item">
                        <div class="row">
                            <div class="col-md-12">
                                <a data-toggle="collapse" href="#faq{!! $key !!}" class="faq-question">{!! $faq['pergunta'] !!}</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="faq{!! $key !!}" class="panel-collapse collapse ">
                                    <div class="row">
                                        <div class="col-md-12 text-left">
                                            <div class="faq-answer" style="padding: 15px 0px 0px 25px; margin: 0px;">
                                                <p>{!! $faq['resposta'] !!}</p>
                                            </div>
                                        </div>
                                        <?php
                                        /*
                                        <div class="col-md-2 text-right">
                                            <div class="container-fluid" style="padding-top: 20px;">
                                                <div class="row">
                                                    <div class="col-md-6 text-center">
                                                        <a onclick=""><i class="fa fa-thumbs-o-up"></i><br>{!! $faq['util'] !!}</a>
                                                    </div>
                                                    <div class="col-md-6 text-center">
                                                        <a onclick=""><i class="fa fa-thumbs-o-down"></i><br>{!! $faq['inutil'] !!}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        */
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
</div>
</div>