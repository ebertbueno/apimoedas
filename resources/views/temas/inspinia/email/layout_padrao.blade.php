<div id=":oe" class="a3s aXjCH ">
  <table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0" style="font-size:14px;font-family:Microsoft Yahei,Arial,Helvetica,sans-serif;padding:0;margin:0;color:#333;background-color:#f7f7f7;">
    <tbody>
      <tr>
        <td>
          <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td align="center" valign="middle" style="padding:33px 0">
                  <a href="" target="_blank">
                    <img src="{!! url(site_id()['logo']) !!}" alt="{!! site_id()['name'] !!}" style="border:0; height: 60px !important; width: auto !important;">
                  </a>
                </td>
              </tr>
              @yield('content')
              <tr>
                <td align="center" style="font-size:12px;color:#999;padding:20px 0">
                  {!! copyright() !!}
                  <a style="color:#999;text-decoration:none" href="https://{!! site_id()['url'] !!}" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://{!! site_id()['url'] !!}">https://{!! site_id()['url'] !!}</a>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>