<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@lang('general.title') |  @yield('title','')</title>
    <link href="/portal/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="/portal/css/sb-admin-2.css" rel="stylesheet">
</head>
<body class="bg-gradient-warning">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        {!! copyright() !!}
    </div>
    <script src="/portal/vendor/jquery/jquery.min.js"></script>
    <script src="/portal/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/portal/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/portal/js/sb-admin-2.min.js"></script>
</body>
</html>