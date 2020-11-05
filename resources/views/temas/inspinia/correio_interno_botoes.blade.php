<div class="float-right">
    <div class="tooltip-demo">

        <!-- ############################ botão de responder ############################ -->
        <a onclick="{!! trataUrlparaFuncao('/communication/office/'.$data['id'].'/edit') !!}" class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="{!! trataTraducoes('Responder') !!}"><i class="fa fa-mail-reply"></i> </a>
        <!-- ############################ botão de responder ############################ -->






    	<?php
    	/*



        <!-- ############################ botão de apagar ############################ -->
        {!! montaCamposFormulario(['cor'=>'danger','url'=>'/communication/office/'.$data['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'remover','classHref'=>'botaoRemover'],'d') !!}
        <!-- ############################ botão de apagar ############################ -->
        <a class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="{!! trataTraducoes('Remover') !!}" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> </a>
        <a class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as important"><i class="fa fa-exclamation"></i> </a>



    	*/
    	?>

    </div>
</div>