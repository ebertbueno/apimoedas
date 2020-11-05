<table class="col-lg-{!! urlCompleta() != '/chat' ? 6 : 12 !!}" border="0" cellpadding="0" cellspacing="0" style="height: auto; float: left !important;">
    <tr>
        <td class="contact-box">
            <div class="row">
                <div class="col-lg-3">
                    <div class="text-center" style="height: auto !important; width: 100% !important;">
                        <img alt="image" class="rounded-circle m-t-xs img-fluid" src="{!! fotoPerfil($data['cli_id']) !!}" style="max-height: 250px;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3><strong>{!! $data['name'] !!}</strong></h3>
                    <p><i class="fa fa-address-card-o"></i> {!! !empty($data['dadosDoCliente']['matricula']) ? $data['dadosDoCliente']['matricula'] : $data['matricula'] !!}</p>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="divider"></div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="divider"></div>
                        @if( urlCompleta() != '/chat' )
                        <div class="col-lg-6 text-center">
                            <a onclick="montaTela('/communication/office/create/{!! $data['matricula'] !!}');">
                                {!! trataTraducoes('Correio interno') !!}<br>
                                <i class="fa fa-envelope" style="color: {!! VerdeVermelho() !!}"></i>
                            </a>
                        </div>
                        @endif
                        <div class="col-lg-{!! urlCompleta() === '/chat' ? 12 : 6 !!} text-center">
                            <a onclick="montaTela('/chat/chat/{!! $data['matricula'] !!}');">
                                {!! trataTraducoes('Chat On-line') !!}<br>
                                <i class="fa fa-weixin" style="color: {!! VerdeVermelho() !!}"> </i> @if( $data['pegaMsgChat'] > 0 )<span class="badge badge-primary">{!! $data['pegaMsgChat'] !!}</span>@endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
</table>