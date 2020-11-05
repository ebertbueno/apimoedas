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
                    <div class="col-lg-2">@include('temas.inspinia.widgets.widget_com_icone',['data' => ['icone'=>'fa fa-send-o','cor'=>'default','label'=>'transferencias_externas','url'=>'/financial/transfer/create']])</div>
                    <div class="col-lg-2">@include('temas.inspinia.widgets.widget_com_icone',['data' => ['icone'=>'fa fa-bank','cor'=>'default','label'=>'transferencias_internas','url'=>'/financial/transferwallet/create']])</div>
                    <div class="col-lg-2">@include('temas.inspinia.widgets.widget_com_icone',['data' => ['icone'=>'fa fa-btc','cor'=>'default','label'=>'depositos_btc','url'=>'/financial/deposits']])</div>
                    <div class="col-lg-2">@include('temas.inspinia.widgets.widget_com_icone',['data' => ['icone'=>'fa fa-building','cor'=>'default','label'=>'depositos_postos','url'=>'/financial/deposits_posts']])</div>
                    <div class="col-lg-2">@include('temas.inspinia.widgets.widget_com_icone',['data' => ['icone'=>'fa fa-random','cor'=>'default','label'=>'conversoes','url'=>'/financial/conversion/create']])</div>
                    <div class="col-lg-2">@include('temas.inspinia.widgets.widget_com_icone',['data' => ['icone'=>'fa fa-money','cor'=>'default','label'=>'livro_de_ofertas','url'=>'/financial/offer_book','contagem'=>count(listaOfertas())]])</div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        @include('temas.inspinia.widgets.dashboard_v2_9',['data' => ['titulo' => trataTraducoes('Pagar'),'valor' => montaCamposFormulario(['cor'=>'primary btn-block','url'=>'/financial/payments/create/qrcode','tipo'=>'LinkGeralIcone','icone'=>'fa fa-usd','label'=>'pagar'],'b'),'subtexto' => '&nbsp;']])
                    </div>
                    <div class="col-lg-6">
                        @include('temas.inspinia.widgets.dashboard_v2_1',['data' => ['titulo' => trataTraducoes('Receber'),'valor' => montaCamposFormulario(['cor'=>'primary btn-block','url'=>'/financial/receive/create','tipo'=>'LinkGeralIcone','icone'=>'fa fa-barcode','label'=>'cadastrar_novo'],'b'),'subtexto' => '&nbsp;']])

                        @include('temas.inspinia.widgets.dashboard_v2_1',['data' => ['titulo' => trataTraducoes('Saldo disponível'),'valor' => '<small style="font-size: 8pt;">'.dadosUsuarioCompleto()['moeda_padrao'].'</small> ' . conversorMoedas(consultaSaldoporUsuario('saldo_disp'), moeda_padrao(), moeda_usuario(), true),'subtexto' => '&nbsp;','porcentagem' => '','icone' => '',]])

                        @include('temas.inspinia.widgets.dashboard_v2_1',['data' => ['titulo' => trataTraducoes('Saldo bloqueado'),'valor' => '<small style="font-size: 8pt;">'.dadosUsuarioCompleto()['moeda_padrao'].'</small> ' . conversorMoedas(consultaSaldoporUsuario('saldo_bloq'), moeda_padrao(), moeda_usuario(), true),'subtexto' => '&nbsp;','porcentagem' => '','icone' => '',]])
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        @include('temas.inspinia.widgets.dashboard_v2_5',['data' => ['titulo' => trataTraducoes('Carteiras'),'dados'=>consultaCarteirasdoUsuario()]])
                    </div>
                </div>

                @php
                $depositos = Model('Financeiro')::where('tipo','deposits')->where('confirmacoes_blockchain', '<', 6)->get();
                @endphp
                @if( count($depositos) > 0 )
                <div class="row">
                    <div class="col-lg-12">
                        @include('temas.inspinia.widgets.dashboard_v2_5_depositos',['data' => ['titulo' => trataTraducoes('Depósitos pendentes'),'dados'=>$depositos]])
                    </div>
                </div>
                @endif


                @php
                $saques = Model('Financeiro')::where('tipo','withdrawalslist')->where('confirmacoes_blockchain', '<', 6)->get();
                @endphp
                @if( count($saques) > 0 )
                <div class="row">
                    <div class="col-lg-12">
                        @include('temas.inspinia.widgets.dashboard_v2_5_saques',['data' => ['titulo' => trataTraducoes('Saques pendentes'),'dados'=>$saques]])
                    </div>
                </div>
                @endif

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
                        @include('temas.inspinia.widgets.dashboard_v2_1',['data' => ['titulo' => trataTraducoes('Seus indicados'),'cor' => 'success','valor' => '<div class="row"><div class="col-lg-6"><h3>'.$totalContado.'</h3></div><div class="col-lg-6">'.montaCamposFormulario(['cor'=>'primary btn-block','url'=>'/registrations/indicated','tipo'=>'LinkGeralIcone','icone'=>'fa fa-sitemap'],'b').'</div></div>','subtexto' => '','porcentagem' => '','icone' => '',]])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection