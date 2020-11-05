<?php
function destravaBotaoFormulario($labelAnterior='continuar'){
  return '<script>
  this.botaoEnviar.disabled=false,
  this.botaoEnviar.innerHTML="'.__("global-".idiomaPadrao().".".$labelAnterior).'";
  </script>
  ';
}