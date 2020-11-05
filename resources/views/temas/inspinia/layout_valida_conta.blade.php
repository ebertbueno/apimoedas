<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{!! site_id()['name'] !!}</title>
  <link href="/temas/inspinia/css/bootstrap.min.css?v={!! versaoSistema() !!}" rel="stylesheet">
  <link href="/temas/inspinia/font-awesome/css/font-awesome.css?v={!! versaoSistema() !!}" rel="stylesheet">
  <link href="/temas/inspinia/css/animate.css?v={!! versaoSistema() !!}" rel="stylesheet">
  <link href="/temas/inspinia/css/plugins/iCheck/custom.css?v={!! versaoSistema() !!}" rel="stylesheet">
  <link href="/temas/inspinia/css/style.css?v={!! versaoSistema() !!}" rel="stylesheet">
  <link href="/temas/inspinia/css/person.css?v={!! versaoSistema() !!}" rel="stylesheet">

  <meta charset=utf-8>
  <meta http-equiv=X-UA-Compatible content="IE=edge">
  <meta name=viewport content="width=device-width,initial-scale=1">
  <meta name=theme-color content=#343a40>
  <meta name=title content="">
  <meta name=description content="">
  <meta name=keywords content="">
  <meta name=robots content="index, follow">
  <meta name=language content=English>

  <link rel=apple-touch-icon sizes=57x57 href=/clientes/{!! site_id()['id'] !!}/pwa/logotipo_57x57.png>
  <link rel=apple-touch-icon sizes=60x60 href=/clientes/{!! site_id()['id'] !!}/pwa/logotipo_60x60.png>
  <link rel=apple-touch-icon sizes=72x72 href=/clientes/{!! site_id()['id'] !!}/pwa/logotipo_72x72.png>
  <link rel=apple-touch-icon sizes=76x76 href=/clientes/{!! site_id()['id'] !!}/pwa/logotipo_76x76.png>
  <link rel=apple-touch-icon sizes=114x114 href=/clientes/{!! site_id()['id'] !!}/pwa/logotipo_114x114.png>
  <link rel=apple-touch-icon sizes=120x120 href=/clientes/{!! site_id()['id'] !!}/pwa/logotipo_120x120.png>
  <link rel=apple-touch-icon sizes=144x144 href=/clientes/{!! site_id()['id'] !!}/pwa/logotipo_144x144.png>
  <link rel=apple-touch-icon sizes=152x152 href=/clientes/{!! site_id()['id'] !!}/pwa/logotipo_152x152.png>
  <link rel=apple-touch-icon sizes=180x180 href=/clientes/{!! site_id()['id'] !!}/pwa/logotipo_180x180.png>
  <link rel=icon type=image/png sizes=192x192 href=/clientes/{!! site_id()['id'] !!}/pwa/logotipo_192x192.png>
  <link rel=icon type=image/png sizes=32x32 href=/clientes/{!! site_id()['id'] !!}/pwa/logotipo_32x32.png>
  <link rel=icon type=image/png sizes=96x96 href=/clientes/{!! site_id()['id'] !!}/pwa/logotipo_96x96.png>
  <link rel=icon type=image/png sizes=16x16 href=/clientes/{!! site_id()['id'] !!}/pwa/logotipo_16x16.png>

  <meta name=msapplication-TileColor content=#ffffff>
  <meta name=msapplication-TileImage content=/clientes/{!! site_id()['id'] !!}/pwa/logotipo_144x144.png>
  <meta name=theme-color content=#ffffff>
  <link rel="shortcut icon" href=/clientes/{!! site_id()['id'] !!}/favicon.ico type=image/x-icon>
  <link rel=icon href=/clientes/{!! site_id()['id'] !!}/favicon.ico type=image/x-icon>

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
</head>
<body class="gray-bg">
  <div class="flex-center position-ref full-height">
    @yield('content')
  </div>
</body>
</html>