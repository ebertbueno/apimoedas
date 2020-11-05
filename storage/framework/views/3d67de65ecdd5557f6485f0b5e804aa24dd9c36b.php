<?php $__env->startSection('content'); ?>

<?php echo !empty($dados['dados']['javascript']) ? $dados['dados']['javascript'] : Null; ?>


<link href="/temas/inspinia/css/plugins/summernote/summernote-bs4.css?v=<?php echo versaoSistema(); ?>" rel="stylesheet">
<link href="/temas/inspinia/css/plugins/chosen/bootstrap-chosen.css?v=<?php echo versaoSistema(); ?>" rel="stylesheet">
<link href="/temas/inspinia/css/style.css?v=<?php echo versaoSistema(); ?>" rel="stylesheet">
<script src="/temas/inspinia/js/jquery-3.1.1.min.js?v=<?php echo versaoSistema(); ?>"></script>
<script src="/temas/inspinia/js/plugins/chosen/chosen.jquery.js?v=<?php echo versaoSistema(); ?>"></script>
<script src="/js/jquery.mask.js?v=<?php echo versaoSistema(); ?>"></script>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title" style="padding: 10px 23px 10px 23px">
                    <?php echo $__env->make('cabecalho', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="row" style="padding: 0px">
                        <div class="col-md-6">
                            <h5 style=" padding: 5px 0px 0px 0px;"><?php echo montaBreadcrumb($dados['dados']['titulo_pagina']); ?></h5>
                            <div class="ibox-tools" style="padding-right: 20px;">
                                <?php echo ( !empty($dados['dados']['botoes_da_datatable']) ? $dados['dados']['botoes_da_datatable'] : Null ); ?>

                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <?php if(!empty($dados['dados']['botao_datatable_padrao'])): ?>
                            <a href="<?php echo $dados['dados']['titulo_pagina']; ?>">
                                <li class="btn btn-warning btn-xs float-right">
                                    <i class="fa fa-list"></i> <?php echo trataTraducoes('Voltar para a listagem'); ?>

                                </li>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <form name="formulario" id="formulario" action="<?php echo url($dados['dados']['rota_geral']); ?>" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar.disabled=true;">
                        <?php echo csrf_field(); ?>
                        <?php $__currentLoopData = $dados['formulario']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formulario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $formulario; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <script src="/temas/inspinia/js/popper.min.js?v=<?php echo versaoSistema(); ?>"></script>
                        <script src="/temas/inspinia/js/bootstrap.js?v=<?php echo versaoSistema(); ?>"></script>
                        <script src="/temas/inspinia/js/plugins/summernote/summernote-bs4.js?v=<?php echo versaoSistema(); ?>"></script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $('.mascaraData').mask('11/11/1111');
        $('.mascaraTempo').mask('00:00:00');
        $('.mascaraDataTempo').mask('00/00/0000 00:00:00');
        $('.mascaraCep').mask('00000-000');
        $('.mascaraTelefone4').mask('0000-0000');
        $('.mascaraTelefone4DDD').mask('(00) 0000-0000');
        $('.mascaraTelefoneUS').mask('(000) 000-0000');
        $('.mascaraMixed').mask('AAA 000-S0S');
        $('.mascaraCPF').mask('000.000.000-00', {reverse: true});
        $('.mascaraMoeda').mask('000.000.000.000.000.00', {reverse: true});
        $('.mascaraBTC').mask('000.000.000.000.000.00000000', {reverse: true});
    });
</script>

<div style="padding-right: 2px; width: 100%; float: left; display: none;">
    <div class="progress">
        <div class="bar"></div>
        <div class="percent"></div >
    </div>
</div>
<div id="status"></div>

<script src="/js/jquery.form.js?v=<?php echo versaoSistema(); ?>"></script>
<script>
    (function() {
        var status = $('#status');
        $('form').ajaxForm({
            beforeSend: function() {
                status.empty();
            },
            success: function() {
            },
            complete: function(xhr) {
                status.html(xhr.responseText);
            }
        }); 
    })();
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('temas.inspinia.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\1-clientes\apis\api\resources\views/temas/inspinia/formulario.blade.php ENDPATH**/ ?>