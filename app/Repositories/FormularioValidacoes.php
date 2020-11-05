<?php
namespace App\Repositories;
use App\Repositories\Componentes;
use DB;

class FormularioValidacoes{

	static function FormularioValidacoes($data, $validacao = ''){
		// primeiro loop para pegar os dados de validação que foram passados

		if( !empty($validacao) ){

			//	declara as variáveis de validação do final
			$statusValidacao = '';
			$msgRetorno = '';

			//	primeiro loop para percorrer todas as validações
			foreach ($validacao as $key => $validado) {

				$campos = explode('|', $key);
				$key = $campos[0];
				$placeholder = traducoesSistema($campos[1]);

				// segundo loop percorrendo cada valição passada para os campos
				foreach ($validado as $acao => $validado2) {
					
					$campoAcao = explode(':', $acao);

					switch ($campoAcao[0]){
						case 'required':
							// 'nome|nome'=>['required'=>'campo_obrigatorio'],
							$statusValidacao .= ( empty($data[$key]) ? 1 : 0 );
							if( (int)$statusValidacao === 1 ){
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => traducoesSistema('atencao').' - '.$placeholder,'texto' => traducoesSistema(''.$validado2)]);
							}
							break;

						case 'unique':
							$campoAcao = explode(',',$campoAcao[1]);
							$consulta = DB::table($campoAcao[0])->where($campoAcao[1], $data[$key])->count();

							if( $consulta != 0 ){
								$statusValidacao .= 1;
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => traducoesSistema('atencao').' - '.$placeholder,'texto' => $key . ' ' . traducoesSistema(''.$validado2)]);
							}
							break;

						case 'min':
							// 'min:3' => 'campo_deve_ter_minimo_de_|min|_caracteres',
							if( strlen($data[$key]) < $campoAcao[1] ){
								$statusValidacao .= 1;
								$validado2 = ( strpos($validado2, '|min|') > 0 ? str_replace('|min|', $campoAcao[1], traducoesSistema(''.$validado2)) : $validado2 );
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => traducoesSistema('atencao').' - '.$placeholder,'texto' => $validado2]);
							}
							break;

						case 'max':
							if( $data[$key] > $campoAcao[1] ){
								$statusValidacao .= 1;
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => traducoesSistema('atencao').' - '.$placeholder,'texto' => traducoesSistema(''.$validado2) . ' ' . $campoAcao[1]]);
							}
							break;

						case 'size':
							if( strlen($data[$key]) <= $campoAcao[1] ){
								$statusValidacao .= 1;
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => traducoesSistema('atencao').' - '.$placeholder,'texto' => traducoesSistema(''.$validado2)]);
							}
							break;

						case 'exists':
							$campoAcao = explode(',',$campoAcao[1]);
							$consulta = DB::table($campoAcao[0])->where($campoAcao[1], $data[$key])->count();

							if( (int)$consulta === 0 ){
								$statusValidacao .= 1;
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => traducoesSistema('atencao').' - '.$placeholder,'texto' => $key . ' ' . traducoesSistema(''.$validado2)]);
							}
							break;

						case 'exists2':
							$campoAcao = explode(',',$campoAcao[1]);
							$consulta = DB::table($campoAcao[0])->where($campoAcao[1], $data[$key])->where($campoAcao[2], Auth()->user()->id)->get();

							if( $consulta === 0 ){
								$statusValidacao .= 1;
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => traducoesSistema('atencao').' - '.$placeholder,'texto' => traducoesSistema(''.$validado2)]);
							}
							break;

						case 'positivo':
							if( $data[$key] < 0 ){
								$statusValidacao .= 1;
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => traducoesSistema('atencao').' - '.$placeholder,'texto' => traducoesSistema(''.$validado2)]);
							}
							break;

						case 'diferente':
							if ( ($data[$key]*1) === ($data[$campoAcao[1]]*1) ) {
								$statusValidacao .= 1;
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => traducoesSistema('atencao').' - '.$placeholder,'texto' => traducoesSistema(''.$validado2)]);
							}
							break;

						case 'equal':
							// 'password|senha'=>['equal:senha,re-senha'=>'senhas_sao_diferentes',],
							$campoAcao = explode(',',$campoAcao[1]);
							if ( $data[$campoAcao[0]] != $data[$campoAcao[1]] ) {
								$statusValidacao .= 1;
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => traducoesSistema('atencao').' - '.$placeholder,'texto' => traducoesSistema(''.$validado2)]);
							}
							break;

						default:
							$statusValidacao .= 0;
							$msgRetorno .= '';
					}
				}
			}
			if ( (int)$statusValidacao > 0 ){
				return $msgRetorno;
			}
		}
		return $data;
	}
};

/*

modelo de chamada

			'nomedocampo' => [
				'int' => traducoesSistema('selecione_um_valor_disponivel'),
				'exists2:carteiras,id,users_id' => traducoesSistema('precisa_ser_uma_carteira_de_sua_propriedade'),
				'checaSaldo:financeiro_saldo,carteira_id' => traducoesSistema('voce_nao_tem_saldo_suficiente_nessa_carteira'),
			],
			'total' => [
				'maiorquezero:financeiro_saldo,carteira_id' => traducoesSistema('voce_nao_tem_saldo_suficiente_nessa_carteira'),
			],

*/