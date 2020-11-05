<?php

use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;

function montaCamposFormulario($data,$tipo='f'){
  if( Auth()->check() ){
    if( strtolower($tipo) === 'f' ){
      return FormularioRepositorie::formulario($data);
    }
  return Componentes::MontaBotao($data);
  }
}