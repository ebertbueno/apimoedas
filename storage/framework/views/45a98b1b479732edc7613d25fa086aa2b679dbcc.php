<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo site_id()['name']; ?> | <?php echo trataTraducoes('Entrar'); ?></title>

    <link href="/temas/inspinia/css/bootstrap.min.css?v=<?php echo versaoSistema(); ?>" rel="stylesheet">
    <link href="/temas/inspinia/font-awesome/css/font-awesome.css?v=<?php echo versaoSistema(); ?>" rel="stylesheet">

    <link href="/temas/inspinia/css/animate.css?v=<?php echo versaoSistema(); ?>" rel="stylesheet">
    <link href="/temas/inspinia/css/style.css?v=<?php echo versaoSistema(); ?>" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div><h1 class="logo-name">&nbsp;</h1></div>
            <h3><?php echo trataTraducoes('campoaqui'); ?></h3>
            <p><?php echo trataTraducoes('campoaqui'); ?></p>
            <?php echo $__env->yieldContent('content'); ?>
            <p class="m-t"> <small><?php echo site_id()['name']; ?> &copy; 2020 / <?php echo date('Y'); ?></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/temas/inspinia/js/jquery-3.1.1.min.js?v=<?php echo versaoSistema(); ?>"></script>
    <script src="/temas/inspinia/js/popper.min.js?v=<?php echo versaoSistema(); ?>"></script>
    <script src="/temas/inspinia/js/bootstrap.js?v=<?php echo versaoSistema(); ?>"></script>

</body>

</html>
<?php /**PATH D:\1-clientes\apis\api\resources\views/temas/inspinia/app.blade.php ENDPATH**/ ?>