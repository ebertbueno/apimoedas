@extends('temas.inspinia.layout_valida_conta')
@section('content')

<div id=":oe" class="a3s aXjCH ">
  <table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0" style="font-size:14px;font-family:Microsoft Yahei,Arial,Helvetica,sans-serif;padding:0;margin:0;color:#333;">
    <tbody>
      <tr>
        <td>
          <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
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
                  <div style="padding:0 30px;background:#fff">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td style="border-bottom:1px solid #e6e6e6;font-size:18px;padding:20px 0">
                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                              <tbody>
                                <tr>
                                  <td>{!! trataTraducoes('Confirme seu registro') !!}</td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td style="font-size:14px;line-height:30px;padding:20px 0;color:#666">{!! trataTraducoes('Bem vindo ') !!} {!! site_id()['name'] !!}!
                          </td>
                        </tr>
                        <tr>
                          <td style="font-size:12px;line-height:25px;padding:20px 0 10px 0;color:#666;font-weight:bolder"> 
                            <span style="font-size:14px;color:red">{!! trataTraducoes('campoaqui') !!}</span>
                            <br>
                            {!! trataTraducoes('campoaqui') !!}
                          </td>
                          <td>
                          </td>
                        </tr>
                        <tr>
                          <td style="padding:30px 0 15px 0;font-size:12px;color:#999;line-height:20px">{!! trataTraducoes('Bem vindo') !!} Binance Team<br>{!! trataTraducoes('Bem vindo') !!} {!! trataTraducoes('campoaqui') !!}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </td>
              </tr>
              <tr>
                <td align="center" style="font-size:12px;color:#999;padding:20px 0">{!! copyright() !!}</td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>

@endsection