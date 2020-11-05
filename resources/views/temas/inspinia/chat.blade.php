<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <h4 style="float: right;">@include('cabecalho')</h4>
                <div class="ibox-title">
                    <h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
                </div>
                <div class="ibox-content">
                    <iframe src="{!! url('/chat'.( !empty($hash) ? '?hash='.$hash : Null )) !!}" width="100%" frameborder="0" scrolling="no" style="height: 65vh !important;"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>