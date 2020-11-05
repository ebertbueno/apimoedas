<tr>
    <td colspan="5" class="text-left">
        <form method="GET" action="<?php echo $dados['dados']['titulo_pagina']; ?>">
            <div class="row">
                <div class="col-md-6">
                    <label><?php echo trataTraducoes('Cliente'); ?></label>
                    <select class="form-control" name="cliente_id" id="cliente_id">
                        <option value=""><?php echo trataTraducoes('Selecione'); ?></option>
                        <?php $__currentLoopData = Model('Users')::where('nivel','cli')->orderby('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuarios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo $usuarios['chave_acesso']; ?>"><?php echo $usuarios['name']; ?> - <?php echo $usuarios['email']; ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5">
                            <label><?php echo trataTraducoes('Data inicial'); ?></label>
                            <input type="date" name="data_ini" id="data_ini" class="form-control" required="required">
                        </div>
                        <div class="col-md-5">
                            <label><?php echo trataTraducoes('Data Final'); ?></label>
                            <input type="date" name="data_fim" id="data_fim" class="form-control" required="required">
                        </div>
                        <div class="col-md-2">
                            <label>&nbsp;</label>
                            <button class="btn btn-primary btn-block"> <i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </td>
</tr><?php /**PATH D:\1-clientes\apis\api\resources\views/temas/inspinia/listagem_busca_datas_clientes.blade.php ENDPATH**/ ?>