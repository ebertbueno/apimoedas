<?php $__env->startSection('content'); ?>

<link href="/temas/inspinia/css/plugins/dataTables/datatables.min.css?v=<?php echo versaoSistema(); ?>" rel="stylesheet">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title" style="padding: 10px 33px 10px 33px">
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
                            <a href="<?php echo $dados['dados']['titulo_pagina']; ?>/create">
                                <li class="btn btn-primary btn-xs float-right">
                                    <i class="fa fa-plus"></i> <?php echo trataTraducoes('Adicionar novo'); ?>

                                </li>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-hover conteudoDatatable" cellpadding="0" cellspacing="0" border="0">
                            <thead>
                                <?php if( !empty($dados['dados']['formulario_adicional']) ): ?>
                                <?php echo $__env->make('temas.inspinia.'.$dados['dados']['formulario_adicional'], ['tamanho' => count($dados['datatable'])], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                                <tr>
                                    <?php $__currentLoopData = $dados['datatable']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $datatable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th style="width:<?php echo $datatable['tabela']; ?>%"><?php echo trataTraducoes($datatable['label']); ?></th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <?php $__currentLoopData = $dados['datatable']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $datatable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th><?php echo trataTraducoes($datatable['label']); ?></th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var tabela;
    $(document).ready(function(){
        tabela = $('.conteudoDatatable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.18/i18n/Portuguese-Brasil.json"
            },
            "ajax": {
                "url": "<?php echo url($dados['dados']['rota_geral']).'/show'; ?>",
                "type": "GET"
            },
            "columns": [
            <?php $__currentLoopData = $dados['datatable']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {"data": "<?php echo $campos['nome_no_banco_de_dados']; ?>" },
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            'paging': <?php echo ( isset($dados['dados']['paging']) ? 'false' : 'true' ); ?>,
            'pageLength': <?php echo ( isset($dados['dados']['pageLength']) ? $dados['dados']['pageLength'] : 25 ); ?>,
            'lengthChange': <?php echo ( isset($dados['dados']['lengthChange']) ? 'false' : 'true' ); ?>,
            'searching': <?php echo ( isset($dados['dados']['searching']) ? 'false' : 'true' ); ?>,
            'ordering': <?php echo ( isset($dados['dados']['ordering']) ? 'false' : 'true' ); ?>,
            'info': <?php echo ( isset($dados['dados']['info']) ? 'true' : 'false' ); ?>,
            'autoWidth': false,
            'responsive': <?php echo ( isset($dados['dados']['responsive']) ? 'false' : 'true' ); ?>,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [

            <?php if( !isset($dados['dados']['botaoPDF']) ): ?>
            {extend: 'pdf', title: '<?php echo urlCompleta(); ?>'},
            <?php endif; ?>

            <?php if( !isset($dados['dados']['botaoExcel']) ): ?>
            {extend: 'excel', title: '<?php echo urlCompleta(); ?>'},
            <?php endif; ?>

            <?php if( !isset($dados['dados']['botaoImprimir']) ): ?>
            {extend: 'print',
            customize: function (win){
                $(win.document.body).addClass('white-bg');
                $(win.document.body).css('font-size', '10px');
                $(win.document.body).find('table')
                .addClass('compact')
                .css('font-size', 'inherit');
            }
        }
        <?php endif; ?>
        ]
    });
    });
</script>

<script src="/temas/inspinia/js/plugins/dataTables/datatables.min.js?v=<?php echo versaoSistema(); ?>"></script>
<script src="/temas/inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js?v=<?php echo versaoSistema(); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('temas.inspinia.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\1-clientes\apis\api\resources\views/temas/inspinia/listagem.blade.php ENDPATH**/ ?>