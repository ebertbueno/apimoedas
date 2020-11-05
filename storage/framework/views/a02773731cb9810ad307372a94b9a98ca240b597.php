<?php $__env->startSection('content'); ?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title" style="padding: 10px 33px 10px 33px">
                    <?php echo $__env->make('cabecalho', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <h5 style=" padding: 5px 0px 0px 0px;"><?php echo montaBreadcrumb($dados['titulo_pagina']); ?></h5>
                    <div class="ibox-tools" style="padding-right: 20px;">
                        <?php echo ( !empty($dados['botoes_da_datatable']) ? $dados['botoes_da_datatable'] : Null ); ?>

                    </div>
                </div>
                <div class="ibox-content">
                    relatório
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('temas.inspinia.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\1-clientes\apis\api\resources\views/temas/inspinia/relatorio_consultas_realizadas.blade.php ENDPATH**/ ?>