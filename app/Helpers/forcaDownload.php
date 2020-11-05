<?php
function forcaDownload($arquivo){
  $arquivo = public_path() . $arquivo;
  if(stripos($arquivo, './') !== false || stripos($arquivo, '../') !== false || !file_exists($arquivo)){
    return direcionaAposConcluir([
      'url'=>'/filesdownloads',
      'cor'=>'warning',
      'mensagem'=>'download_indisponivel_no_momento',
      'titulo'=>'atencao',
    ]);
  }else{
    header('Cache-control: private');
    header('Content-Type: application/octet-stream');
    header('Content-Length: '.filesize($arquivo));
    header('Content-Disposition: filename='.$arquivo);
    header("Content-Disposition: attachment; filename=".basename($arquivo));
    readfile($arquivo);
  }
}