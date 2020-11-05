<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{!! env('APP_NAME','') !!}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
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
    <link href="/temas/inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="/temas/inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/temas/inspinia/css/animate.css" rel="stylesheet">
    <link href="/temas/inspinia/css/style.css" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="flex-center position-ref full-height">
        <div class="loginColumns animated fadeInDown">
            <div class="row">
                @if(session('mensagem'))
                <div class="col-md-12 bg-warning">{!! session('mensagem') !!}</div>
                @endif
                <div class="col-md-6">
                    <img src="/logotipo.svg?v={!! versaoSistema() !!}" style="width: 50% !important; padding-top: 10vh !important;">
                </div>
                <div class="col-md-6">
                    @yield('content')
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-12 text-right">
                    <small>{!! copyright() !!}</small>
                </div>
            </div>
        </div>
    </div>
</body>
</html>