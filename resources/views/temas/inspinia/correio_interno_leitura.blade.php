<div class="container-fluid">
    <div class="fh-breadcrumb">
        <div class="row">
            <div class="col-sm-2">
                <div style="height: 63vh !important; overflow-x: auto;">
                    <div class="panel-options">
                        <ul class="nav nav-tabs">
                            <li><a class="nav-link active show" href="#mensagensRecebidos" data-toggle="tab"><i class="fa fa-envelope-o"></i></a></li>
                            <li><a class="nav-link" href="#mensagensEnviados" data-toggle="tab"><i class="fa fa-send-o"></i></a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="mensagensRecebidos">
                            @include('temas.inspinia.correio_interno_layout_esquerda',['dadosLoop' => $dados['data'],'tipo'=>'recebidos'])
                        </div>
                        <div class="tab-pane" id="mensagensEnviados">
                            @include('temas.inspinia.correio_interno_layout_esquerda',['dadosLoop' => $dados['data'],'tipo'=>'enviados'])
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div style="height: 63vh !important; overflow-x: auto;">
                    <div class="element-detail-box">
                        @include('temas.inspinia.correio_interno_layout_direita',['dadosLoopInterno' => $dados['data']])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>