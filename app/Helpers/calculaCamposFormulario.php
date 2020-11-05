<?php
function calculaCamposFormulario($data=''){
  if( !empty($data['filhos']) ){

    $formulaMontada = '<script>function calculaCamposFormulario(){';

    foreach( $data['filhos'] as $key => $filhos ){
      $campo_1 = $filhos['campo_1'];
      $campo_2 = $filhos['campo_2'];
      $operacao = $filhos['operacao'];
      $campo_destino = $filhos['campo_destino'];
      $casas_decimais = ( !empty($filhos['casas_decimais']) ? $filhos['casas_decimais'] : 2 );

      $valorFator = 1;
      $i=0;
      while ($i < $casas_decimais) {
        $valorFator .= 0;
        $i++;
      }

      $formulaMontada .= 'var campo_1'.$key.' = formulario.'.$campo_1.'.value;';
      $formulaMontada .= 'if( !campo_1'.$key.' ){';
      $formulaMontada .= 'campo_1'.$key.' = 0.00;';
      $formulaMontada .= '}';
      $formulaMontada .= 'campo_1'.$key.' = campo_1.replace(/[^\d]+/g,"");';
      $formulaMontada .= 'var campo_02'.$key.' = formulario.'.$campo_2.'.value;';
      $formulaMontada .= 'var campo_2'.$key.' = ( campo_02'.$key.'.indexOf("%") > 0 ? campo_02'.$key.'.replace("%","") : campo_02 )';
      $formulaMontada .= ( $operacao === 'igual' ? 'var total'.$key.''.$key.' = parseInt(campo_1'.$key.');' : 'var total'.$key.''.$key.' = parseInt(campo_1'.$key.') '.$operacao.' parseInt(campo_2'.$key.');' );
      $formulaMontada .= 'total'.$key.' = parseInt(total'.$key.' / '.$valorFator.');';
      $formulaMontada .= ' if( campo_2'.$key.'.indexOf("%") > 0 ){ total'.$key.' = total'.$key.'/100 } ';
      $formulaMontada .= 'var formatado'.$key.' = total'.$key.'.toLocaleString("pt-br", { minimumFractionDigits: '.$casas_decimais.' });';
      $formulaMontada .= 'formulario.'.$campo_destino.'.value = formatado'.$key.';';
    }
    $formulaMontada .= '}</script>';
  } else {
    $campo_1 = ( !empty($data['campo_1']) ? $data['campo_1'] : Null );
    $campo_2 = ( !empty($data['campo_2']) ? $data['campo_2'] : Null );
    $campo_destino = ( !empty($data['campo_destino']) ? $data['campo_destino'] : Null );
    $operacao = ( !empty($data['operacao']) ? $data['operacao'] : '+' );
    $casas_decimais = ( !empty($data['casas_decimais']) ? $data['casas_decimais'] : 2 );
    $valorFator = 1;
    $i=0;
    while ($i < $casas_decimais) {
      $valorFator .= 0;
      $i++;
    }

    $formulaMontada = '<script>';
    $formulaMontada .= 'function calculaCamposFormulario()';
    $formulaMontada .= '{';
    $formulaMontada .= 'var campo_1 = formulario.'.$campo_1.'.value;';
    $formulaMontada .= 'if( !campo_1 ){';
    $formulaMontada .= 'campo_1 = 0.00;';
    $formulaMontada .= '}';
    $formulaMontada .= 'campo_1 = campo_1.replace(/[^\d]+/g,"");';
    $formulaMontada .= 'var campo_02 = formulario.'.$campo_2.'.value;';
    $formulaMontada .= ' if( campo_02.indexOf("%") > 0 ){ var campo_2 = campo_02.replace("%","") } else { var campo_2 = campo_02 }';
    $formulaMontada .= ' if( campo_02.indexOf("%") > 0 ){ var porcentagem = 100 } else { var porcentagem = 1 }';
    $formulaMontada .= ( $operacao === 'igual' ? 'var total = parseInt(campo_1);' : 'var total = parseInt(campo_1) '.$operacao.' parseInt(campo_2);' );
    $formulaMontada .= 'total = parseInt(total / '.$valorFator.');';
    $formulaMontada .= 'total = parseInt(total / porcentagem);';
    $formulaMontada .= 'var formatado = total.toLocaleString("pt-br", { minimumFractionDigits: '.$casas_decimais.' });';
    $formulaMontada .= 'formulario.'.$campo_destino.'.value = formatado;';
    $formulaMontada .= '}';
    $formulaMontada .= '</script>';
  }

  return $formulaMontada;
}