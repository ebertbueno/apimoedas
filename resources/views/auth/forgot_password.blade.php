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
            <h3>{!! trataTraducoes('Esqueci minha senha') !!}</h3>
            <p>{!! trataTraducoes('texto_forgot_password') !!}</p>

            <form method="POST" action="{{ url('/forgot_password') }}">
                @csrf
                <div class="form-group">
                    <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">{!! trataTraducoes('Enviar email') !!}</button>

                <a href="{{ url('/login') }}"><small>{!! trataTraducoes('Entrar') !!}</small></a>
            </form>

            <p class="m-t"> <small>{!! site_id()['name'] !!} &copy; 2020 / {!! date('Y') !!}</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/temas/inspinia/js/jquery-3.1.1.min.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/popper.min.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/bootstrap.js?v={!! versaoSistema() !!}"></script>

</body>

</html>