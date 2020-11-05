@extends('temas.inspinia.layout')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">&nbsp;</div>
        <div class="col-lg-12">
            <div class="ibox">
                @if( verificaSePossuiSenhaFinanceira() === 0 )
                <div class="row">
                    <div class="col-lg-12">
                        @include('temas.inspinia.widgets.dashboard_v2_8')
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        @include('temas.inspinia.widgets.dashboard_v2_9',['data' => ['titulo' => trataTraducoes('Pagar'),'valor' => montaCamposFormulario(['cor'=>'primary btn-block','url'=>'/financial/payments/create/qrcode','tipo'=>'LinkGeralIcone','icone'=>'fa fa-usd','label'=>'pagar'],'b'),'subtexto' => '&nbsp;']])
                    </div>
                    <div class="col-lg-6">
                        @include('temas.inspinia.widgets.dashboard_v2_1',['data' => ['titulo' => trataTraducoes('Receber'),'valor' => montaCamposFormulario(['cor'=>'primary btn-block','url'=>'/financial/receive/create','tipo'=>'LinkGeralIcone','icone'=>'fa fa-usd','label'=>'receber'],'b'),'subtexto' => '&nbsp;']])

                        @include('temas.inspinia.widgets.dashboard_v2_1',['data' => ['titulo' => trataTraducoes('Saldo disponível'),'valor' => '<small style="font-size: 8pt;">'.dadosUsuarioCompleto()['moeda_padrao'].'</small> ' . conversorMoedas(consultaSaldoporUsuario('saldo_disp'), moeda_padrao(), moeda_usuario(), true),'subtexto' => '&nbsp;','porcentagem' => '','icone' => '',]])

                        @include('temas.inspinia.widgets.dashboard_v2_1',['data' => ['titulo' => trataTraducoes('Saldo bloqueado'),'valor' => '<small style="font-size: 8pt;">'.dadosUsuarioCompleto()['moeda_padrao'].'</small> ' . conversorMoedas(consultaSaldoporUsuario('saldo_bloq'), moeda_padrao(), moeda_usuario(), true),'subtexto' => '&nbsp;','porcentagem' => '','icone' => '',]])
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        @include('temas.inspinia.widgets.dashboard_v2_5',['data' => ['titulo' => trataTraducoes('Carteiras'),'dados'=>consultaCarteirasdoUsuario()]])
                    </div>
                </div>
                <?php
                /*
                <div class="row">
                    <div class="col-lg-6">
                        @include('temas.inspinia.widgets.dashboard_v2_0',['data' => ['qual'=>'qrcode','titulo' => trataTraducoes('Receber'),'url'=>'/financial/receive','altura'=>350,'icone'=>'fa fa-list']])
                    </div>
                    <div class="col-lg-6">
                        @include('temas.inspinia.widgets.dashboard_v2_0',['data' => ['qual'=>'lerqrcode','titulo' => trataTraducoes('Pagar'),'url'=>'/financial/payments','altura'=>350,'icone'=>'fa fa-list']])
                    </div>
                </div>
                */
                ?>
                <div class="row">
                    <div class="col-lg-9">
                        @include('temas.inspinia.widgets.dashboard_v2_7',['data' => ['titulo' => trataTraducoes('Link de recomendações'),]])
                    </div>
                    <div class="col-lg-3">
                        <?php
                        $totalContado = ultimosIndicados();
                        $totalContado = ( empty($totalContado) ? "0 " : count($totalContado) );
                        ?>
                        @include('temas.inspinia.widgets.dashboard_v2_1',['data' => ['titulo' => trataTraducoes('Seus indicados'),'cor' => 'success','valor' => '<h3>'.$totalContado.'</h3>','subtexto' => '','porcentagem' => '','icone' => '',]])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection