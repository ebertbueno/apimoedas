<?php
function trataOperacaoIlegal($data=''){

  $mensagem = ( !empty($data['mensagem']) ? trataTraducoes($data['mensagem']) : trataTraducoes('voce_executou_uma_operacao_ilegal') );
  $url = ( !empty($data['url']) ? $data['url'] : urlCompleta() );

  Model('Users')->find(Auth()->user()->id)->increment('tentativas',1);
  Model('LogSistema')::create([
    'pagina' => $url,
    'conteudo' => 'trataOperacaoIlegal',
  ]);
  $consulta = Model('Users')->find(Auth()->user()->id);

  echo exibeToastrAlerta([
    'cor' => 'error',
    'mensagem' => $mensagem,
    'titulo' => trataTraducoes('erro'),
  ]);

  if( $consulta['tentativas'] > 3 ){
    Auth::logout();
    echo '<script>window.location.href = "/sair";</script>';
    dd(trataTraducoes('voce_foi_banido_por_varias_tentativas_ilegais'));
  }
  echo '<script>window.location.href = "/ilegal_action";</script>';
  dd();
}