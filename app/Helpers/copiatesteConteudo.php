<?php
function copiatesteConteudo($data=''){

  $codigo = rand();

  $conteudo = ( !empty($data['conteudo']) ? $data['conteudo'] : 'conteudo de teste' );
  $label = ( !empty($data['label']) ? $data['label'] : 'Copiar' );
  $idCampoCopiar = ( !empty($data['idCampoCopiar']) ? $data['idCampoCopiar'] : 'idCopiarTexto' ).$codigo;
  $cor = ( !empty($data['cor']) ? $data['cor'] : 'success' );
  $texto = ( !empty($data['texto']) ? $data['texto'] : 'Conteúdo copiado com sucesso' );
  $titulo = ( !empty($data['titulo']) ? $data['titulo'] : 'Sucesso' );
  $icone = ( !empty($data['icone']) ? $data['icone'] : 'fa fa-copy' );
  $alinhamento = ( !empty($data['alinhamento']) ? $data['alinhamento'] : 'float-left' );

  $botaoSeletor = ( !empty($data['botaoSeletor']) ? $data['botaoSeletor'] : 'botaoCopiarTexto' ).$codigo;

  $conteudoMontado = '';
  $conteudoMontado .= '<a class="btn btn-success btn-xs '.$alinhamento.'" style="cursor: pointer; color: #fff !important" id="'.$botaoSeletor.'"> ';
  $conteudoMontado .= ' <i class="'.$icone.'"></i> ';
  $conteudoMontado .= trataTraducoes($label);
  $conteudoMontado .= '<div style="width: 0.1px !important; height: 0.1px !important; z-index: -100 !important; background-color: transparent !important; border:0px !important; overflow:hidden !important;"><textarea id="'.$idCampoCopiar.'">'.trataTraducoes($conteudo).'</textarea></div>';
  $conteudoMontado .= ' </a>';
  $conteudoMontado .= '<script type="text/javascript">';
  $conteudoMontado .= "var copyTextareaBtn = document.querySelector('#".$botaoSeletor."');";
  $conteudoMontado .= "copyTextareaBtn.addEventListener('click', function(event){";
  $conteudoMontado .= "var copyTextarea = document.querySelector('#".$idCampoCopiar."');";
  $conteudoMontado .= 'copyTextarea.select();';
  $conteudoMontado .= "document.execCommand('copy');";
  $conteudoMontado .= 'Command: toastr["'.$cor.'"]("'.trataTraducoes($texto).'", "'.trataTraducoes($titulo).'");';
  $conteudoMontado .= 'toastr.options = {';
  $conteudoMontado .= '"closeButton": true,';
  $conteudoMontado .= '"debug": false,';
  $conteudoMontado .= '"progressBar": true,';
  $conteudoMontado .= '"preventDuplicates": false,';
  $conteudoMontado .= '"positionClass": "toast-top-right",';
  $conteudoMontado .= '"onclick": null,';
  $conteudoMontado .= '"showDuration": "400",';
  $conteudoMontado .= '"hideDuration": "1000",';
  $conteudoMontado .= '"timeOut": "7000",';
  $conteudoMontado .= '"extendedTimeOut": "1000",';
  $conteudoMontado .= '"showEasing": "swing",';
  $conteudoMontado .= '"hideEasing": "linear",';
  $conteudoMontado .= '"showMethod": "fadeIn",';
  $conteudoMontado .= '"hideMethod": "fadeOut"';
  $conteudoMontado .= '}';
  $conteudoMontado .= '});';
  $conteudoMontado .= '</script>';

  return $conteudoMontado;
}