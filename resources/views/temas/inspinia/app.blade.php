<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{!! site_id()['name'] !!} | {!! trataTraducoes('Entrar') !!}</title>

    <link href="/temas/inspinia/css/bootstrap.min.css?v={!! versaoSistema() !!}" rel="stylesheet">
    <link href="/temas/inspinia/font-awesome/css/font-awesome.css?v={!! versaoSistema() !!}" rel="stylesheet">

    <link href="/temas/inspinia/css/animate.css?v={!! versaoSistema() !!}" rel="stylesheet">
    <link href="/temas/inspinia/css/style.css?v={!! versaoSistema() !!}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div><h1 class="logo-name">&nbsp;</h1></div>
            <h3>{!! trataTraducoes('campoaqui') !!}</h3>
            <p>{!! trataTraducoes('campoaqui') !!}</p>
            @yield('content')
            <p class="m-t"> <small>{!! site_id()['name'] !!} &copy; 2020 / {!! date('Y') !!}</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/temas/inspinia/js/jquery-3.1.1.min.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/popper.min.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/bootstrap.js?v={!! versaoSistema() !!}"></script>

</body>

</html>
