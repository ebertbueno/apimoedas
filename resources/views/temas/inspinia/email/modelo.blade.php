@extends('temas.inspinia.email.layout_padrao')
@section('content')

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
                    <td>Confirm Your Registration</td>
                    <td>

                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td style="font-size:14px;line-height:30px;padding:20px 0;color:#666">Welcome to Binance!<br>
              Here is your account activation code: <br>
              <span style="padding:5px 0;font-size:20px;font-weight:bolder;color:#e9b434">
                800072
              </span>
            </td>
          </tr>
          <tr>
            <td style="font-size:12px;line-height:25px;padding:20px 0 10px 0;color:#666;font-weight:bolder"> 
              <span style="font-size:14px;color:red">Security Tips:</span>
              <br>
              * DO NOT give your password to anyone!<br>
              * DO NOT call any phone number for someone claiming to be Binance Support!<br>
              * DO NOT send any money to anyone claiming to be a member of Binance!<br>
              * Enable Google Two Factor Authentication!<br>
              * Make sure you are visiting "<a href="http://www.binance.com" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.binance.com&amp;source=gmail&amp;ust=1585498528014000&amp;usg=AFQjCNGjPmgvVTMn0BCYaPaUbQvDQjX6Kg">www.binance.com</a>"!<br>
            </td>
            <td>
            </td>
          </tr>
          <tr>
            <td style="padding:20px 0 0 0;line-height:26px;color:#666">If this activity is not your own operation, please contact our official customer representative by the following link: <a style="color:#e9b434" href="https://www.binance.com/en/support" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.binance.com/en/support&amp;source=gmail&amp;ust=1585498528014000&amp;usg=AFQjCNHlDka6jkxXbzwQbXawlFUyVaj8Gw">https://www.binance.com/en/<wbr>support</a>
            </td>
          </tr>
          <tr>
            <td style="padding:30px 0 15px 0;font-size:12px;color:#999;line-height:20px">Binance Team<br>Automated message.please do not reply</td>
          </tr>
        </tbody>
      </table>
    </div>
  </td>
</tr>

@endsection