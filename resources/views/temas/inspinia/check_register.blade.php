@extends('temas.inspinia.layout_valida_conta')
@section('content')

<div id=":oe" class="a3s aXjCH ">
  <table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0" style="font-size:14px;font-family:Microsoft Yahei,Arial,Helvetica,sans-serif;padding:0;margin:0;color:#333;">
    <tr>
      <td>
        <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td align="center" valign="middle" style="padding:33px 0">
                <a href="" target="_blank">
                  <img src="/clientes/{!! site_id()['id'] !!}/logotipo.png" height="60">
                </a>
              </td>
            </tr>
            <tr>
              <td> 
                <div style="padding:10px 30px;background:#fff">
                  <h3><h1 class="text-center">{!! trataTraducoes('Verifique seu email') !!}</h1></h3>
                  <p>
                    <div>{!! str_replace('||email||',$_SESSION['email'],trataTraducoes('campoaqui')) !!}</div>
                  </p>
                  <div class="text-center"><h3>{!! trataTraducoes('Código de verificação') !!}</h3></div>
                  @include('temas.inspinia.mostra_erros')
                  @if( StatusDoSistema() === 0 )
                  Chave = {!! Model('PinSolicitados')->orderby('id','desc')->first()['pin'] !!}
                  @endif
                  <form name="formulario" id="formulario" action="/check_register" method="post" onsubmit="return this.botaoEnviar.disabled=true">
                  @csrf
                    {!! $senhaFinanceira !!}

                  @include('temas.inspinia.formulario_rodape')
                  <div>
                    <p>{!! str_replace('||site_id_name||',site_id()['name'],trataTraducoes('campoaqui')) !!}</p>
                  </div>
                  <div>
                  @if( !empty($_SESSION['email']) )
                    <a href="/resend_mail">{!! trataTraducoes('Reenviar email') !!}</a>
                  @endif
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </table>
</div>

@endsection