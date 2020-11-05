<?php if(session('mensagem')): ?>
<div class="bg-<?php echo !empty(session('mensagem')[1]) ? session('mensagem')[1] : 'primary'; ?>" style="width: 100% !important; padding: 10px; margin:5px 0px 15px 0px;">
	<?php echo trataTraducoes( !empty(session('mensagem')[0]) ? session('mensagem')[0] : session('mensagem') ); ?>

</div>
<?php endif; ?><?php /**PATH D:\1-clientes\apis\api\resources\views/cabecalho.blade.php ENDPATH**/ ?>