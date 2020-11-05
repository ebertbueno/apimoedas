<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo env('APP_NAME',''); ?> | <?php echo trataTraducoes('Entrar'); ?></title>

    <link href="/temas/inspinia/css/bootstrap.min.css?v=<?php echo versaoSistema(); ?>" rel="stylesheet">
    <link href="/temas/inspinia/font-awesome/css/font-awesome.css?v=<?php echo versaoSistema(); ?>" rel="stylesheet">

    <link href="/temas/inspinia/css/animate.css?v=<?php echo versaoSistema(); ?>" rel="stylesheet">
    <link href="/temas/inspinia/css/style.css?v=<?php echo versaoSistema(); ?>" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div><h1 class="logo-name">&nbsp;</h1></div>
            <h3><?php echo trataTraducoes('Área restrita'); ?></h3>

            <form method="POST" action="<?php echo e(url('/login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <input id="email" type="email" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                    <?php if($errors->has('email')): ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                    <?php if($errors->has('password')): ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b"><?php echo trataTraducoes('Entrar'); ?></button>
            </form>

            <p class="m-t"> <small><?php echo site_id()['name']; ?> &copy; 2020 / <?php echo date('Y'); ?></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/temas/inspinia/js/jquery-3.1.1.min.js?v=<?php echo versaoSistema(); ?>"></script>
    <script src="/temas/inspinia/js/popper.min.js?v=<?php echo versaoSistema(); ?>"></script>
    <script src="/temas/inspinia/js/bootstrap.js?v=<?php echo versaoSistema(); ?>"></script>

</body>

</html>
<?php /**PATH D:\1-clientes\apis\api\resources\views/auth/login.blade.php ENDPATH**/ ?>