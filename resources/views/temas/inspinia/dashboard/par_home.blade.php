@extends('temas.inspinia.layout')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">&nbsp;</div>
        <div class="col-lg-12">
            <div class="ibox">
                <div class="row">
                    <div class="col-lg-6">
                        @include('temas.inspinia.widgets.dashboard_v2_3',['data' => [
                        'totalmensagens' => 0,
                        'titulo' => trataTraducoes('Correio interno'),
                        'subtitulo' => trataTraducoes('Novas mensagens'),
                        'data' => pegaMensagensUsuario(),
                        'texto_sem_mensagem' => trataTraducoes('campoaqui')
                        ]])
                    </div>
                    <div class="col-lg-6">
                        @include('temas.inspinia.widgets.dashboard_v2_4',['data' => ['titulo' => trataTraducoes('Tickets'),'valor' => montaCamposFormulario(['cor'=>'primary btn-block','url'=>'/financial/payments/create/qrcode','tipo'=>'LinkGeralIcone','icone'=>'fa fa-list','label'=>'listar'],'b'),'subtexto' => '&nbsp;']])

                        @include('temas.inspinia.widgets.dashboard_v2_1',['data' => ['titulo' => trataTraducoes('Correio interno'),'valor' => montaCamposFormulario(['cor'=>'primary btn-block','url'=>'/financial/payments/create/qrcode','tipo'=>'LinkGeralIcone','icone'=>'fa fa-list','label'=>'listar'],'b'),'subtexto' => '&nbsp;']])

                        @include('temas.inspinia.widgets.dashboard_v2_1',['data' => ['titulo' => trataTraducoes('Chat'),'valor' => montaCamposFormulario(['cor'=>'primary btn-block','url'=>'/financial/payments/create/qrcode','tipo'=>'LinkGeralIcone','icone'=>'fa fa-list','label'=>'listar'],'b'),'subtexto' => '&nbsp;']])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection