<?php
$capturaDadosdeAjuda = capturaDadosdeAjuda();
/*
<a class="btn btn-primary btn-circle" data-toggle="modal" data-target="#modalAjudaGeral"><i class="fa fa-question-circle"></i></a>

<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<i class="fa fa-laptop modal-icon"></i>
<i class="fa fa-question modal-icon"></i>
                <i class="fa fa-laptop modal-icon"></i>
*/
?>

<div class="modal inmodal" id="modalAjudaGeral" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <h4 class="modal-title">{!! $capturaDadosdeAjuda['titulo'] !!}</h4>
            </div>
            <div class="modal-body">
                <p>
                    {!! !empty($capturaDadosdeAjuda['texto']) ? trataTraducoes($capturaDadosdeAjuda['texto']) : trataTraducoes('Em breve') !!}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white btn-xs" data-dismiss="modal">{!! trataTraducoes('Fechar') !!}</button>
            </div>
        </div>
    </div>
</div>