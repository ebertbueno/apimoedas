<?php
function verificaSenhaFinanceira($senha,$nomeCampo, $gravaNova){
  if( Auth()->check() ){

    if( is_array($senha) ){
      $retorno = '';
      foreach( $senha as $dados ){
        $retorno .= $dados;
      }
      $senha = $retorno;
    }

    $checaSenhaFinanceira = Model('UsersPin')::where('users_id', Auth()->user()->id)->count();
    if( $checaSenhaFinanceira === 0 & $gravaNova === 'n' ){
      $retorno = '"';
      $retorno .= '<a onclick="';
      $retorno .= "montaTela('/settings/pins')";
      $retorno .= '" style="cursor: pointer;">';
      $retorno .= trataTraducoes('clique_aqui_para_cadastrar_uma_senha_financeira');
      $retorno .= '</a>';
      $retorno .= '"';
      return Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => trataTraducoes('atencao'),'texto' => trataTraducoes('cadastre_uma_senha_financeira_para_concluir_essa_acao')]);
    }

    $pin = hash_hmac('sha256', md5($senha), Auth()->user()->id);
    if( $gravaNova === 's' ){
      return $pin;
    }
    $pin = ( !empty($pin) ? $pin : date('Y-m-d h:m:s') );

    $retorno = Model('UsersPin')::where('pin', $pin)->where('users_id', Auth()->user()->id)->count();
    if( $retorno === 0 ){
      echo "<script>
      var elements = document.getElementsByClassName('".$nomeCampo."_salta');
      for(var x=0; x<elements.length; x++){
        elements[x].value= '';
      }
      </script>";

      return Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => trataTraducoes('atencao'),'texto' => trataTraducoes('senha_financeira_incorreta')]);
    }
    return [
      'status' => $retorno,
      'senhaFinanceira' => $pin,
    ];
  }
}