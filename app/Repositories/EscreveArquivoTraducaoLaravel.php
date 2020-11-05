<?php
namespace App\Repositories;

use App\Models\Traducoes;
use fopen;

class EscreveArquivoTraducaoLaravel{

	static function EscreveArquivoTraducaoLaravel(){

        $idiomas = Model('Idiomas')::get('sigla');

        foreach ($idiomas as $key => $idioma) {
            $idioma = $idioma['sigla'];

    		$data = Traducoes::get(['chave', $idioma]);   
            // $data = Traducoes::get(['chave', 'pt-br']);
    		
    		$diretorio0 = resource_path();
    		$diretorio1 = '\lang\pt-br\\';

            $arquivoSolicitado = $diretorio0.$diretorio1.'global-'.$idioma.'.php';
    		$arquivo = fopen($arquivoSolicitado,'w');

    		$conteudo = '<?php ';
    		$conteudo .=  "\n".'return [';
    		foreach($data as $datas){

              $textoCorrigido = '';
              $textoCorrigido = str_replace("&quot;",'"',$datas[$idioma]);
              $textoCorrigido = str_replace("&gt;",'>',$textoCorrigido);
              $textoCorrigido = str_replace("&lt;",'<',$textoCorrigido);

    		  $conteudo .= "\n" . "'" . str_replace("'","\'",$datas["chave"]) . "'=>'".str_replace("'","\'",$textoCorrigido)."',";
              // $conteudo .= "\n   '".$datas['chave']."' => '".str_replace("'","\'",$datas[$idioma])."',";
    		}
    		$conteudo .= "\n".'];';

    		fwrite($arquivo, $conteudo);
    		fclose($arquivo);
	   }
            // dd('sucesso');
    }




	static function geraTraducoesGeral(){
        EscreveArquivoTraducaoLaravel::EscreveArquivoTraducaoLaravel();
	}
};