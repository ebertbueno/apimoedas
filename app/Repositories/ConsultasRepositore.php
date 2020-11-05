<?php
namespace App\Repositories;
use App\Repositories\Tratamentos;
/*
	armazena todas as consultas que serão executadas
	'tabela_relacional'=>[
		'model'=>'Textos',
		'select'=>['texto as value', 'titulo as label_1'],
		'where'=>['campo'=>'condicao'],
		'order' => [array de where],
	],
*/
class ConsultasRepositore{
	static function ConsultasRepositore($data){
		/*
			$data = [
				'model' => nomedamodel,
				'select' => [array de select],
				'where' => [array de where],
				'order' => [array de where],
			]
		*/
		if( !empty($data['model']) ){
				$qualModel = $data['model'];
				$conexao = 'App\Models\\' . $qualModel;
				$objeto = new $conexao();
				$order = ( !empty($data['order']) ? $data['order'] : 'id' );
				if( !empty($data['where']) ){
					$retorno = $objeto::select($data['select'])->where($data['where'])->orderby($order)->get();
				} else {
					$retorno = $objeto::select($data['select'])->orderby($order)->get();
				}
		} else {
			if( is_array($data) ){
				$tipo = $data['tabela'];
			} else {
				$tipo = ( !empty($data['tipo']) ? $data['tipo'] : $data );
			}

			switch ($tipo) {
				// aqui deve se passar a condição da tabela textos, definido no campo local_uso
				case 'Consulta_Tabela_Textos':
					$retorno = Model('Textos')::where('local_uso',$data['local_uso'])->orderby('label_1')->get();
					foreach( $retorno as $data ){
						$data['value'] = $data['texto'];
						$data['label_1'] = $data['titulo'];
						if( !empty($data['imagem'])  ){
							$data['label_2'] = $data['imagem'];
						}
						if( !empty($data['link'])  ){
							$data['label_3'] = $data['link'];
						}
					}
					break;
				case 'Consulta_idioma_disponivel':
					$retorno = Model('Idiomas')::get();
					foreach( $retorno as $data ){
						$data['value'] = $data['sigla'];
						$data['label_1'] = traducoesSistema($data['nome']);
					}
					break;
				case 'Consulta_Paises':
					$retorno = Model('Paises')::orderby('nome')->get();
					foreach( $retorno as $data ){
						$data['value'] = $data['id'];
						$data['label_1'] = traducoesSistema($data['nome']);
					}
					break;
				case 'Consulta_Paises_Com_Sigla':
					$retorno = Model('Paises')::where('ddi', '<>', Null)->select(['ddi as value', 'ddi as label_1', 'nome as label_2'])->get();
					break;
				case 'Consulta_Tipos_Moedas':
						$retorno = [
							[
								'value' => 'e',
								'label_1' => traducoesSistema('externo'),
							],
							[
								'value' => 'i',
								'label_1' => traducoesSistema('interno'),
							],
						];
					break;
				case 'Consulta_Documentos_Perfil':
					$retorno = Model('Configuracoes')::select(['valor as value','valor as label_1'])->where('chave','tipos_documentos_perfil')->orderby('valor')->get();
					break;
				case 'Consulta_Sexo':
					$retorno = Model('Textos')::select(['texto as value', 'titulo as label_1'])->where('local_uso','sexo')->orderby('titulo')->get();
					break;
				case 'Consulta_Status_Cadastro':
					$retorno = Model('Textos')::where('local_uso', 'status_cadastros_cores')->where('imagem', '>', 0)->select(['imagem as value', 'titulo as label_1'])->orderby('ordem')->get();
					break;
				case 'Consulta_Status_Cadastro_Simples':
					$retorno = Model('Textos')::where('local_uso', 'status_cadastros_cores')->whereIn('imagem', [3,1,100])->where('imagem', '>', 0)->select(['imagem as value', 'titulo as label_1'])->orderby('ordem')->get();
					break;
				case 'Consulta_Sim_Nao_1_0':
					$retorno = Model('Textos')::select(['texto as value', 'titulo as label_1'])->where('local_uso','sim_nao_1_0')->orderby('titulo')->get();
					break;
				case 'Consulta_lista_de_contatos':

					if( Auth()->user()->nivel === 'cli' ){
						// $retorno = Model('ListadeContatos')::where('users_id', Auth()->user()->id)->where('cli_id', '<>', Auth()->user()->id)->get();
						$retorno = pegaContatosChat(True);
						foreach( $retorno as $data ){
							$data['value'] = $data['hash'];
							$data['label_1'] = ( !empty($data['name']) ? $data['name'] : ( !empty($data['nome']) ? $data['nome'] : Null ) );
							$data['label_2'] = $data['matricula'];
						}
					} else {
						$retorno = Model('UserSemRelacionamentos')::where('nivel', 'cli')->orderby('name')->get();
						foreach( $retorno as $data ){
							$data['value'] = $data['matricula'];
							$data['label_1'] = $data['name'];
							$data['label_2'] = $data['matricula'];
						}
					}
					break;
				case 'Consulta_Grupo_FAQ':
					$retorno = Model('FaqGrupos')::join('traducoes','traducoes.chave','=','faq_grupos.nome')->select('faq_grupos.id as value', 'traducoes.'.idiomaPadrao().' as label_1')->get();
					break;
				case 'Consulta_modulo_disponivel':
					$retorno = Model('Modulos')::select(['sigla as value','nome as label_1'])->orderby('label_1')->get();
					break;
				case 'Consulta_Usuarios_Geral':
					$retorno = Model('Users')::select(['id as value', 'nivel as label_1', 'email as label_2', 'name as label_3'])->orderby('nivel')->orderby('email')->orderby('name')->get();
					break;
				case 'Consulta_Niveis_Acesso':
					$consultaAtual = Model('UsersNiveis')::select('ordem')->where('sigla', Auth()->user()->nivel)->first()['ordem'];
					$retorno = Model('UsersNiveis')::select(['sigla as value', 'nome as label_1'])->where('ordem', '>', $consultaAtual)->where('sigla','<>','cli')->orderby('ordem')->get();
					break;
				case 'Consulta_Usuarios_Por_Nivel':
					$retorno = Model('Users')::select(['nivel as value', 'nivel as label_1'])->groupby('nivel')->whereNotIn('nivel',['adm','ger'])->get();
			        foreach( $retorno as $r ){
			        	$r['label_1'] = Model('UsersNiveis')::where('sigla',$r['value'])->first()['nome'];
			        }
					break;
				case 'Consulta_Empresas_sem_Contrato':
					$retorno = Model('Users')::where('nivel', 'emp')->select(['users.id as value','users.name as label_1','users.email as label_2'])->orderby('name')->get();
					break;
				case 'Consulta_Ticket_Type':
					$data = Model('TicketsVariacoes')::where('tipo', 'type')->select(['id as value','texto as label_1'])->get();
					$retorno = [];
					foreach( $data as $r ){
						$retorno[] = [
							'value' => $r['value'],
							'label_1' => traducoesSistema($r['label_1']),
						];
					}
					break;
				case 'Consulta_Ticket_Priority':
					$data = Model('TicketsVariacoes')::where('tipo', 'priority')->select(['id as value','texto as label_1'])->get();
					$retorno = [];
					foreach( $data as $r ){
						$retorno[] = [
							'value' => $r['value'],
							'label_1' => traducoesSistema($r['label_1']),
						];
					}
					break;
				case 'Consulta_Ticket_Status':
					$data = Model('TicketsVariacoes')::where('tipo', 'status')->select(['id as value','texto as label_1'])->get();
					$retorno = [];
					foreach( $data as $r ){
						$retorno[] = [
							'value' => $r['value'],
							'label_1' => traducoesSistema($r['label_1']),
						];
					}
					break;
				case 'Consulta_Carteiras_Sistema':
					$retorno = Model('Carteiras')::where('pode_alterar', 1)->select(['id as value', 'nome as label_1', 'hash as label_2'])->get();
					break;
				case 'Consulta_Carteiras_Usuario':
					$consulta = Model('Carteiras')::get();

					$qualMaior = Model('FinanceiroSaldo')::orderby('saldo_disp','desc')->first();

					$retorno = [];
					foreach( $consulta as $key => $retornos ){
						$retorno[$key]['value'] = $retornos['id'];
						$retorno[$key]['label_1'] = $retornos['nome'] . ' ( '.$retornos['moeda_id'].' ) ';
						$retorno[$key]['label_2'] = $retornos['hash'];

						$valorMontado = adicionaEspacos('$'.conversorMoedas($retornos['SaldoConta']['saldo_disp'], moeda_padrao(),moeda_usuario(),true),(strlen($qualMaior['saldo_disp'])+2),'l');
						$retorno[$key]['label_3'] = moeda_usuario().' '.$valorMontado;
					}
					break;
				case 'Consulta_Carteiras_Usuario_Apenas_USD':
					$consulta = Model('Carteiras')::where('moeda_id','USD')->get();

					$qualMaior = Model('FinanceiroSaldo')::orderby('saldo_disp','desc')->first();

					$retorno = [];
					foreach( $consulta as $key => $retornos ){
						$retorno[$key]['value'] = $retornos['id'];
						$retorno[$key]['label_1'] = $retornos['nome'] . ' ( '.$retornos['moeda_id'].' ) ';
						$retorno[$key]['label_2'] = $retornos['hash'];

						$valorMontado = adicionaEspacos('$'.conversorMoedas($retornos['SaldoConta']['saldo_disp'], moeda_padrao(),moeda_usuario(),true),(strlen($qualMaior['saldo_disp'])+2),'l');
						$retorno[$key]['label_3'] = moeda_usuario().' '.$valorMontado;
					}
					break;
				case 'Consulta_Carteiras_Usuario_Apenas_TDX':
					$consulta = Model('Carteiras')::where('moeda_id','TDX')->get();

					$qualMaior = Model('FinanceiroSaldo')::orderby('saldo_disp','desc')->first();

					$retorno = [];
					foreach( $consulta as $key => $retornos ){
						$retorno[$key]['value'] = $retornos['id'];
						$retorno[$key]['label_1'] = $retornos['nome'] . ' ( '.$retornos['moeda_id'].' ) ';
						$retorno[$key]['label_2'] = $retornos['hash'];

						$valorMontado = adicionaEspacos('$'.conversorMoedas($retornos['SaldoConta']['saldo_disp'], moeda_padrao(),moeda_usuario(),true),(strlen($qualMaior['saldo_disp'])+2),'l');
						$retorno[$key]['label_3'] = moeda_usuario().' '.$valorMontado;
					}
					break;
				case 'Consulta_Carteiras_Usuario_Apenas_TDX_Verifica_Negativo':
					$consulta = Model('Carteiras')::where('moeda_id','TDX')->get();

					$qualMaior = Model('FinanceiroSaldo')::orderby('saldo_disp','desc')->first();

					$retorno = [];
					$total = 0;
					foreach( $consulta as $key => $retornos ){
						if( $retornos['SaldoConta']['saldo_disp'] < 0 ){
							$total++;
							$retorno[$key]['value'] = $retornos['id'];
							$retorno[$key]['label_1'] = $retornos['nome'] . ' ( '.$retornos['moeda_id'].' ) ';
							$retorno[$key]['label_2'] = $retornos['hash'];

							$valorMontado = adicionaEspacos('$'.conversorMoedas($retornos['SaldoConta']['saldo_disp'], moeda_padrao(),moeda_usuario(),true),(strlen($qualMaior['saldo_disp'])+2),'l');
							$retorno[$key]['label_3'] = moeda_usuario().' '.$valorMontado;
						}
					}

					if( $total === 0 ){
						foreach( $consulta as $key => $retornos ){
							$total++;
							$retorno[$key]['value'] = $retornos['id'];
							$retorno[$key]['label_1'] = $retornos['nome'] . ' ( '.$retornos['moeda_id'].' ) ';
							$retorno[$key]['label_2'] = $retornos['hash'];

							$valorMontado = adicionaEspacos('$'.conversorMoedas($retornos['SaldoConta']['saldo_disp'], moeda_padrao(),moeda_usuario(),true),(strlen($qualMaior['saldo_disp'])+2),'l');
							$retorno[$key]['label_3'] = moeda_usuario().' '.$valorMontado;
						}
					}
					break;
				case 'Consulta_Carteiras_Usuario_Apenas_BTC':
					$consulta = Model('Carteiras')::where('moeda_id','BTC')->get();

					$qualMaior = Model('FinanceiroSaldo')::orderby('saldo_disp','desc')->first();

					$retorno = [];
					foreach( $consulta as $key => $retornos ){
						$retorno[$key]['value'] = $retornos['id'];
						$retorno[$key]['label_1'] = $retornos['nome'] . ' ( '.$retornos['moeda_id'].' ) ';
						$retorno[$key]['label_2'] = $retornos['hash'];

						// $valorMontado = adicionaEspacos(conversorMoedas($retornos['SaldoConta']['saldo_disp'], moeda_padrao(),moeda_usuario(),true),(strlen($qualMaior['saldo_disp'])+2),'l');
						// $retorno[$key]['label_3'] = moeda_usuario().' '.$valorMontado;
					}
					break;
				case 'Consulta_Carteiras_Usuario_Apenas_BTC_com_saldo':
					$consulta = Model('Carteiras')::where('moeda_id','BTC')->get();

					$qualMaior = Model('FinanceiroSaldo')::orderby('saldo_disp','desc')->first();

					$retorno = [];
					foreach( $consulta as $key => $retornos ){
						if( $retornos['SaldoConta']['saldo_disp'] > 0 ){
							$retorno[$key]['value'] = $retornos['id'];
							$retorno[$key]['label_1'] = $retornos['nome'] . ' ( '.$retornos['moeda_id'].' ) ';
							$retorno[$key]['label_2'] = $retornos['hash'];

							$valorMontado = adicionaEspacos('$'.conversorMoedas($retornos['SaldoConta']['saldo_disp'], moeda_padrao(),moeda_usuario(),true),(strlen($qualMaior['saldo_disp'])+2),'l');
							$retorno[$key]['label_3'] = moeda_usuario().' '.$valorMontado;
						}
					}
					break;
				case 'Consulta_Carteiras_Usuario_Apenas_Com_saldo':
					$consulta = Model('Carteiras')::get();

					$qualMaior = Model('FinanceiroSaldo')::orderby('saldo_disp','desc')->first();

					$retorno = [];
					foreach( $consulta as $key => $retornos ){
						if( $retornos['SaldoConta']['saldo_disp'] > 0 ){
							$retorno[$key]['value'] = $retornos['id'];
							$retorno[$key]['label_1'] = $retornos['nome'] . ' ( '.$retornos['moeda_id'].' ) ';
							$retorno[$key]['label_2'] = $retornos['hash'];

							$valorMontado = adicionaEspacos('$'.conversorMoedas($retornos['SaldoConta']['saldo_disp'], moeda_padrao(),moeda_usuario(),true),(strlen($qualMaior['saldo_disp'])+2),'l');
							$retorno[$key]['label_3'] = moeda_usuario().' '.$valorMontado;
						}
					}
					break;
				case 'Consulta_Carteiras_Usuario_Filtro_Moeda':
					
					// $consulta = Model('campoaqui')::where('moeda_id','like','%'.$data['filtro'].'%')->get();
					$consulta = Model('Carteiras')::where('moeda_id','=',$data['filtro'])->get();
	
					$retorno = [];
					$count = 1;

					foreach( $consulta as $retornos ){
						$retorno[] = [
							'value' => $retornos['id'],
							'label_1' => $retornos['nome'] . ' ( '.$retornos['moeda_id'].' ) ',
							'label_2' => $retornos['nome'],
							'label_3' => moeda_usuario().' $'.conversorMoedas($retornos['SaldoConta']['saldo_disp'], moeda_padrao(),moeda_usuario(),true),
						];
						$count++;
					}

					// $stringEspacos = contaEspacos($retorno['label_1'].$retorno['label_2'].$retorno['label_3']);

					break;
				case 'Consulta_Carteiras_BTC_Usuario':
					$consulta = Model('CarteirasExternas')::get();

					$retorno = [];
					foreach( $consulta as $key => $retornos ){
						$retorno[$key]['value'] = $retornos['id'];
						$retorno[$key]['label_1'] = $retornos['nome'];
						$retorno[$key]['label_2'] = $retornos['hash'];
					}
					break;
				case 'Consulta_Moedas_Plataforma':
					$retorno = Model('MoedasPlataforma')::select(['moeda_sigla as value','moeda_sigla as label_1','moeda_nome as label_2'])->orderby('moeda_nome')->get();
					break;
				case 'Consulta_Tipos_Alertas':
					$data = Model('AlertasTipo')::select(['id as value', 'titulo as label_1'])->get();

					$retorno = [];
					foreach( $data as $key => $datas ){
						$retorno[$key] = [
							'value' => $datas['id'],
							'label_1' => traducoesSistema($datas['label_1']),
						];
					}
					break;
				case 'Consulta_Taxas_Ja_Usadas_no_contrato':
					$retorno = Model('TiposTaxasSistema')::
	                    leftjoin('contratos_taxas','contratos_taxas.taxa','=','tipos_taxas_sistema.url')->
	                    select(['tipos_taxas_sistema.url as value', 'tipos_taxas_sistema.nome as label_1'])->
	                    whereNotIn('tipos_taxas_sistema.url',Model('ContratosTaxas')::where('contratos_id',$data['id'])->get(['taxa']))->
	                    get();
					break;

				case 'Consulta_redes_lojas_classificacao':
					$data = Model('RedesLojasClassificacao')::get();
					
					$retorno = [];
					foreach( $data as $key => $datas ){
					    $retorno[$key]['value'] = $datas['id'];
					    $retorno[$key]['label_1'] = $datas['traducao'][Auth()->user()->idioma];
					}
				break;

				case 'Consulta_Redes_Lojas':
					$data = Model('RedesLojas')::orderby('taxa_deposito')->orderby('pais')->orderby('estado')->orderby('cidade')->orderby('endereco')->get();
					
					$retorno = [];
					foreach( $data as $key => $datas ){
					    $retorno[$key]['value'] = $datas['id'];
					    $retorno[$key]['label_1'] = $datas['nome'];
					    $retorno[$key]['label_2'] = $datas['telefone'];
					    $retorno[$key]['label_3'] = '('.str_replace('|',', ',$datas['moedas_aceitas']).')';
					}
				break;
				
				default:
					$retorno = [];
					break;
			}
		}

		foreach( $retorno as $key => $data ){
			$data['label_1'] = traducoesSistema($data['label_1']);
			if( isset($data['label_2']) ){
				$data['label_2'] = traducoesSistema($data['label_2']);
			}
		}
		
		return $retorno;
	}


	static function WidgetConsultasRepositore($qualConsulta = ''){
		switch ($qualConsulta) {
			case 'select_ultimos_usuarios':
			$consulta = User::where('root', Auth()->user()->id)->select('name as label_1', 'created_at as label_2', 'foto as imagem')->orderby('id', 'desc')->whereBetween('created_at', primeiroUltimodia())->get();
			break;
			default:
			$consulta = [];
			break;
		}
		return $consulta;
	}
};