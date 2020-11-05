<?php
namespace App\Repositories;
use App\Models\Users;
use App\Models\PinSolicitados;
use App\Models\CamposDoSistema;
use App\Models\Carteiras;
use App\Repositories\Tratamentos;
use App\Repositories\ConsultasRepositore;
use App\Repositories\FormularioRepositorie;
use Hash;
use App\Models\ApagarModelLocal;
use App\Models\MoedasConversoes;
use App\Models\CriptoMoedasConversoes;

// $chave = User::find(1);
// $blockchain = $chave['id'] . $chave['name'] . $chave['email'] . $chave['matricula'] . $chave['created_at'];
// return Tratamentos::blockchain($blockchain);

/*

modelo de botoões no inspinia

<div class="ibox-tools">
	<a class="collapse-link">
		<i class="fa fa-chevron-up"></i>
	</a>
	<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
		<i class="fa fa-wrench"></i>
	</a>
	<ul class="dropdown-menu dropdown-user" x-placement="bottom-start" style="position: absolute; top: 18px; left: 26px; will-change: top, left;">
		<li>
			<a href="#" class="dropdown-item">Config option 1</a>
		</li>
		<li>
			<a href="#" class="dropdown-item">Config option 2</a>
		</li>
	</ul>
	<a class="close-link">
		<i class="fa fa-times"></i>
	</a>
</div>

*/

class Componentes{

	static function geraCarteiraPadrao($empresaID,$usersId,$nomeCarteira='carteira_padrao',$moeda_id='USD',$pode_alterar=1){
		$dados = [
					'emp_id' => $empresaID,
					'users_id' => $usersId,
					'nome' => trataTraducoes($nomeCarteira),
					'moeda_id' => $moeda_id,
					'pode_alterar' => $pode_alterar,
					'hash' => 'T'.$moeda_id.Componentes::geraNumeroCarteira(),
				];

		return Carteiras::create($dados);
	}

	static function MontaBotao($data){

		$tipo = ( !empty($data['tipo']) ? $data['tipo'] : 'LinkGeral' );
		$size = ( !empty($data['size']) ? $data['size'] : 10 );
		$tamanhoCheio=( !empty($data['tamanhoCheio']) ? $data['tamanhoCheio'] : 1 );
		$url = ( !empty($data['url']) ? $data['url'] : '/backend/home' );
		$cor = ( !empty($data['cor']) ? 'btn-'.$data['cor'] : 'btn-white' );
		$icone = ( !empty($data['icone']) ? verificaImagemouIcone($data['icone']) : ' <i class="fa fa-plus"> </i> ' );
		$titulo = ( !empty($data['titulo']) ? trataTraducoes($data['titulo']) : '' );
		$label = ( !empty($data['label']) ? trataTraducoes($data['label']) : '' );
		$target = ( !empty($data['target']) ? $data['target'] : Null );
		$style = ( !empty($data['style']) ? $data['style'] : '' );
		$styleButton = ( !empty($data['styleButton']) ? $data['styleButton'] : '' );
		$pullright = ( !empty($data['float-right']) ? $data['float-right'] : 'float-right' );
		$classHref = ( !empty($data['classHref']) ? $data['classHref'] : Null );
		$campoName = ( !empty($data['name']) ? 'name="'.$data['name'].'"' : Null );
		$campoId = ( !empty($data['id']) ? 'id="'.$data['id'].'"' : ' id="botaoEnviar"' );
		// $botaoToaster

		//	campos para o modal
		$modalNome = ( !empty($data['modalNome']) ? $data['modalNome'] : 'nome'.rand(1,100).'Modal' );
		$modalTamanho = ( !empty($data['modalTamanho']) ? $data['modalTamanho'] : 'lg' );
		$modalEfeito = ( !empty($data['modalEfeito']) ? $data['modalEfeito'] : 'fadeIn' );
		$modalConteudo = ( !empty($data['modalConteudo']) ? $data['modalConteudo'] : 'Sem conteúdo para ser exibido' );

		$tamDiv = ( !empty($data['tamDiv']) ? $data['tamDiv'] : 10);
		$tamLabel = ( !empty($data['tamLabel']) ? $data['tamLabel'] : 2);
		

		switch ($tipo) {
			case 'botaoToaster':
				$cor = str_replace('btn-', '', $cor);

				echo '<script>this.botaoEnviar.disabled=false</script>';
				$timeOut = ( !empty($data['timeOut']) ? $data['timeOut'] : 5000 );
				$progressBar = ( !empty($data['progressBar']) ? $data['progressBar'] : true );
				$botao = "<script>
				Command: toastr['".$cor."']('".$data['texto']."', '".$data['titulo']."');
						 toastr.options = {
						 	'closeButton': false,
						 	'debug': false,
						 	'newestOnTop': false,
						 	'progressBar': ".$progressBar.",
						 	'positionClass': 'toast-top-right',
						 	'preventDuplicates': true,
						 	'onclick': null,
						 	'showDuration': '300',
						 	'hideDuration': '1000',
						 	'timeOut': ".$timeOut.",
						 	'extendedTimeOut': '1000',
						 	'showEasing': 'swing',
						 	'hideEasing': 'linear',
						 	'showMethod': 'fadeIn',
						 	'hideMethod': 'fadeOut'
					 	}</script>";
				break;

			case 'modalGeral':
					$botao = '<a style="cursor: pointer" data-toggle="modal" data-target="#'.$modalNome.'">';
					$botao .= '<li class="btn btn-xs '.$cor.'" title="'.$titulo.'" style="'.$style.'">';
					$botao .= $icone;
					$botao .= $label;
					$botao .= '</li>';
					$botao .= '</a>';


					$botao .= '<div class="modal inmodal" id="'.$modalNome.'" tabindex="-1" role="dialog"  aria-hidden="true">';
					$botao .= '<div class="modal-dialog modal-'.$modalTamanho.'">';
					$botao .= '<div class="modal-content animated '.$modalEfeito.'">';
					$botao .= '<div class="modal-body">';
					$botao .= $modalConteudo;
					$botao .= '</div>';
					$botao .= '<div class="modal-footer">';
					$botao .= '<button type="button" class="btn btn-white" data-dismiss="modal">'.trataTraducoes('fechar').'</button>';
					$botao .= '</div>';
					$botao .= '</div>';
					$botao .= '</div>';
					$botao .= '</div>';
				break;

			case 'linkDireto':
				$botao = '<a onclick="'.trataUrlparaFuncao($url).'" style="cursor: pointer">';
				$botao .= '<li title="'.$titulo.'" style="list-style: none; '.$style.'">';
				$botao .= $icone.' &nbsp';
				$botao .= $label;
				$botao .= '</li>';
				$botao .= '</a>';
			break;
			
			case 'LinkGeral':
				if( $target ){
					$botao = '<a href="'.url($url).'" target="'.$target.'">';
					$botao .= '<li class="btn btn-sm btn-block btn-'.$cor.'" title="'.$titulo.'" style="'.$style.'">';
					$botao .= $icone.' &nbsp';
					$botao .= $label;
					$botao .= '</li>';
					$botao .= '</a>';
				} else {
					$botao = '<a onclick="'.trataUrlparaFuncao($url).'" style="cursor: pointer">';
					$botao .= '<li class="btn btn-sm btn-block btn-'.$cor.'" title="'.$titulo.'" style="'.$style.'">';
					$botao .= $icone;
					$botao .= $label;
					$botao .= '</li>';
					$botao .= '</a>';
				}
				break;
			
			case 'BotaoModalSalvar':
				$botao = '';
				if( $tamanhoCheio === 1 ){
				$botao .= '<div class="form-group row">';
				$botao .= '<label class="col-sm-'.$tamLabel.' col-form-label"></label>';
				}
				$botao .= '<div class="col-sm-'.$tamDiv.'">';
				$botao .= '<button style="'.$style.'" type="submit" class="ladda-button btn-block btn btn-sm '.$cor.'" data-style="expand-left" '.$campoName.' '.$campoId.' >';
				$botao .= ''. ( strlen($icone) > 5 ? ''.$icone.' &nbsp; ' : ''  ).'';
				$botao .= $titulo;
				$botao .= '</button>';
				$botao .= '</div>';
				if( $tamanhoCheio === 1 ){
				$botao .= '</div>';
				}
				break;

			case 'BotaoRemover':
				$retornoBotao = '';
				$alertBotaoRemover = ( !empty($data['alertBotaoRemover']) ? $data['alertBotaoRemover'] : '' );
				switch ($alertBotaoRemover) {
					case 'desativar':
/* 0 */					$retornoBotao .= 'title:' . trataTraducoes('atencao') . '|';
/* 1 */					$retornoBotao .= 'text:' . trataTraducoes('deseja_desativar_esse_registro') . '|';
/* 2 */					$retornoBotao .= 'type:' . 'warning' . '|';
/* 3 */					$retornoBotao .= 'confirmButtonColor:' . '#DD6B55' . '|';
/* 4 */					$retornoBotao .= 'confirmButtonText:' . trataTraducoes('sim') . '|';
/* 5 */					$retornoBotao .= 'cancelButtonText:' . trataTraducoes('nao') . '|';
					break;
					
					case 'reativar':
/* 0 */					$retornoBotao .= 'title:' . trataTraducoes('atencao') . '|';
/* 1 */					$retornoBotao .= 'text:' . trataTraducoes('deseja_reativar_esse_registro') . '|';
/* 2 */					$retornoBotao .= 'type:' . 'warning' . '|';
/* 3 */					$retornoBotao .= 'confirmButtonColor:' . '#DD6B55' . '|';
/* 4 */					$retornoBotao .= 'confirmButtonText:' . trataTraducoes('sim') . '|';
/* 5 */					$retornoBotao .= 'cancelButtonText:' . trataTraducoes('nao') . '|';
					break;
					
					default:
/* 0 */					$retornoBotao .= 'title:' . trataTraducoes('atencao') . '|';
/* 1 */					$retornoBotao .= 'text:' . trataTraducoes('confirma_remocao_do_registro') . '|';
/* 2 */					$retornoBotao .= 'type:' . 'warning' . '|';
/* 3 */					$retornoBotao .= 'confirmButtonColor:' . '#DD6B55' . '|';
/* 4 */					$retornoBotao .= 'confirmButtonText:' . trataTraducoes('sim') . '|';
/* 5 */					$retornoBotao .= 'cancelButtonText:' . trataTraducoes('nao') . '|';
					break;
				}

				// caso passe o array de dentro do botão
				if( is_array($alertBotaoRemover) ){
					$retornoBotao = '';
					foreach( $alertBotaoRemover as $key => $botaoMontado ){
						$retornoBotao .= ''.$key.':' . $botaoMontado . '|';
					}
				}
				// caso passe o array de dentro do botão

				$botao = '<a data-url="'.$url.'" data-alert="'.$retornoBotao.'" data-token='.csrf_token().' title="'.$label.'" class="btn-apagar btn '.$cor.' '.( $cor != 'btn-white' ? 'text-white' : Null ).' btn-xs float-right" data-placement="top" style="margin: 0px 2px;">'.$icone.' '.$label.'</a>';
				break;

			case 'LinkGeralIcone':
			if( empty($data['filhos']) ){
				if( $target ){
					$botao = '<a href="'.$url.'" target="'.$target.'" title="'.trataTraducoes($label).'" class="btn-apagar btn '.$cor.' '.( $cor != 'btn-white' ? 'text-white' : Null ).'  btn-xs float-right '.$classHref.'" data-placement="top" style="margin: 0px 2px; padding: 0px 10px 0px 10px;">'.$icone.' '.trataTraducoes($label).'</a>';
				} else {
					// $botao = '<a onclick="'.trataUrlparaFuncao($url).'" title="'.trataTraducoes($label).'" style="margin: 0px 5px 0px 5px; float: '.( !empty($data['float']) ? $data['float'] : 'right' ).' !important; '.$styleButton.'" class="btn-apagar btn '.$cor.' '.( $cor != 'btn-white' ? 'text-white' : Null ).' btn-xs float-right '.$classHref.'" data-placement="top" style="margin: 0px 2px;"> '.$icone.' <span style="'.$style.'">'.trataTraducoes($label).'</span></a>';

					$botao = '<a href="'.$url.'" title="'.trataTraducoes($label).'" style="margin: 0px 5px 0px 5px; float: '.( !empty($data['float']) ? $data['float'] : 'right' ).' !important; '.$styleButton.'" class="btn-apagar btn '.$cor.' '.( $cor != 'btn-white' ? 'text-white' : Null ).' btn-xs float-right '.$classHref.'" data-placement="top" style="margin: 0px 2px;"> '.$icone.' <span style="'.$style.'">'.trataTraducoes($label).'</span></a>';
				}
			} else {
				$botao = '<a  class="dropdown-toggle btn '.$cor.' '.( $cor != 'btn-white' ? 'text-white' : Null ).' btn-xs float-right '.$classHref.'" data-toggle="dropdown" href="#">'.$icone.' '.trataTraducoes($label).'</a><ul class="dropdown-menu dropdown-user">';

				foreach( $data['filhos'] as $key => $filhos ){
					$botao .= '<li><a href="'.$filhos['url'].'" class="dropdown-item"> <i class="'.$filhos['icone'].'"> </i> '.trataTraducoes($filhos['label']).'</a></li>';
				}
				$botao .= '</ul>';
			}
				break;
			
			default:
				$botao = '<div style="padding: 3px;" class="col-sm-'.$size.' '.$pullright.'">&nbsp;</div>';
				break;
		}

		return $botao;
	}


	static function GrupoBotao($data=''){
		$componente = '';
		$componente .='<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">';
		$componente .='teste ';
		$componente .='</a>';
		$componente .='<ul class="dropdown-menu dropdown-user" x-placement="bottom-start" style="position: absolute; top: 18px; left: -68px; will-change: top, left;">';
		$componente .='<li><a href="#" class="dropdown-item">Config option 1</a>';
		$componente .='</li>';
		$componente .='<li><a href="#" class="dropdown-item">Config option 2</a>';
		$componente .='</li>';
		$componente .='</ul>';

		return $componente;
	}


	static function BuscaData($data){

		$tipo = ( isset($data['tipo']) ? $data['tipo'] : '' );

		switch ($tipo) {
			case 'meses_ano':
			$BuscaData = '
			<select class="form-control" name="mes" id="mes" required="required">
			<option value="" class="form-control">Selecione</option>
			<option '.( ($data['mes']) === ((date('Y')-1).'-07') ? 'selected="selected"' : '' ).' value="'.(date('Y')-1).'-07" class="form-control">Julho - '.(date('Y')-1).'</option>
			<option '.( ($data['mes']) === ((date('Y')-1).'-08') ? 'selected="selected"' : '' ).' value="'.(date('Y')-1).'-08" class="form-control">Agosto - '.(date('Y')-1).'</option>
			<option '.( ($data['mes']) === ((date('Y')-1).'-09') ? 'selected="selected"' : '' ).' value="'.(date('Y')-1).'-09" class="form-control">Setembro - '.(date('Y')-1).'</option>
			<option '.( ($data['mes']) === ((date('Y')-1).'-10') ? 'selected="selected"' : '' ).' value="'.(date('Y')-1).'-10" class="form-control">Outubro - '.(date('Y')-1).'</option>
			<option '.( ($data['mes']) === ((date('Y')-1).'-11') ? 'selected="selected"' : '' ).' value="'.(date('Y')-1).'-11" class="form-control">Novembro - '.(date('Y')-1).'</option>
			<option '.( ($data['mes']) === ((date('Y')-1).'-12') ? 'selected="selected"' : '' ).' value="'.(date('Y')-1).'-12" class="form-control">Dezembro - '.(date('Y')-1).'</option>
			<option '.( ($data['mes']) === ((date('Y')).'-01') ? 'selected="selected"' : '' ).' value="'.(date('Y')).'-01" class="form-control">Janeiro - '.(date('Y')).'</option>
			<option '.( ($data['mes']) === ((date('Y')).'-02') ? 'selected="selected"' : '' ).' value="'.(date('Y')).'-02" class="form-control">Fevereiro - '.(date('Y')).'</option>
			<option '.( ($data['mes']) === ((date('Y')).'-03') ? 'selected="selected"' : '' ).' value="'.(date('Y')).'-03" class="form-control">Março - '.(date('Y')).'</option>
			<option '.( ($data['mes']) === ((date('Y')).'-04') ? 'selected="selected"' : '' ).' value="'.(date('Y')).'-04" class="form-control">Abril - '.(date('Y')).'</option>
			<option '.( ($data['mes']) === ((date('Y')).'-05') ? 'selected="selected"' : '' ).' value="'.(date('Y')).'-05" class="form-control">Maio - '.(date('Y')).'</option>
			<option '.( ($data['mes']) === ((date('Y')).'-06') ? 'selected="selected"' : '' ).' value="'.(date('Y')).'-06" class="form-control">Junho - '.(date('Y')).'</option>
			<option '.( ($data['mes']) === ((date('Y')).'-07') ? 'selected="selected"' : '' ).' value="'.(date('Y')).'-07" class="form-control">Julho - '.(date('Y')).'</option>
			<option '.( ($data['mes']) === ((date('Y')).'-08') ? 'selected="selected"' : '' ).' value="'.(date('Y')).'-08" class="form-control">Agosto - '.(date('Y')).'</option>
			<option '.( ($data['mes']) === ((date('Y')).'-09') ? 'selected="selected"' : '' ).' value="'.(date('Y')).'-09" class="form-control">Setembro - '.(date('Y')).'</option>
			<option '.( ($data['mes']) === ((date('Y')).'-10') ? 'selected="selected"' : '' ).' value="'.(date('Y')).'-10" class="form-control">Outubro - '.(date('Y')).'</option>
			<option '.( ($data['mes']) === ((date('Y')).'-11') ? 'selected="selected"' : '' ).' value="'.(date('Y')).'-11" class="form-control">Novembro - '.(date('Y')).'</option>
			<option '.( ($data['mes']) === ((date('Y')).'-12') ? 'selected="selected"' : '' ).' value="'.(date('Y')).'-12" class="form-control">Dezembro - '.(date('Y')).'</option>
			</select>
			<div style="padding: 3px;" class="col-sm-2"><button id="botaoEnviar" class="btn btn-sm btn-primary btn-block '.$pullright.'"> <i class="fa fa-search"> </i> </button></div>';
			break;
			
			default:
			$BuscaData = '<input autocomplete="off" type="date" name="data_i" id="data_i" value="'.$data['data_i'].'" class="form_control" style="width:100%"></div><div class="col-sm-5"><input autocomplete="off" type="date" name="data_f" id="data_f" value="'.$data['data_f'].'" class="form_control" style="width:100%"></div><div class="col-sm-2"><button id="botaoEnviar" class="btn btn-sm btn-primary btn-block '.$pullright.'"> <i class="fa fa-search"> </i> </button>';
			break;
		}

		return $BuscaData;

	}


	static function janelasFlutuantesModulos($cabecalho, $dados){

		$janelasFlutuantesModulos = '<div class="col-sm-12"><div class="nav-tabs-custom"><ul class="nav nav-tabs">';

		foreach( $cabecalho as $key => $cabecalhos ){
			$janelasFlutuantesModulos .= '<li class="'.($key === 0 ? 'active' : '').'"  style="width: '.round(100/count($cabecalho)).'%; text-align: left; overflow: hidden; padding: 0px; margin: 0px;"><a style="padding: 5px" href="#tab_'.$key.'" data-toggle="tab">'.$cabecalhos['label_1'].'</a></li>';
		}

		$janelasFlutuantesModulos .= '</ul><div class="tab-content">';
		
		foreach( $cabecalho as $key => $cabecalhos ){
			$janelasFlutuantesModulos .= '<div class="tab-pane '.($key === 0 ? 'active' : '').'" id="tab_'.$key.'">';
			$janelasFlutuantesModulos .= 'conteudo de '.$cabecalhos['label_1'].' aqui';
			$janelasFlutuantesModulos .= '</div>';
		}

		return $janelasFlutuantesModulos;
	}


	static function janelasFlutuantesAccordion($janela, $dados){

		$janelasFlutuantesAccordion = '<div class="col-sm-12" style="padding: 0px"><div class="box box-solid"><div class="box-body"><div class="box-group" id="accordion_'.$janela.'">';

		foreach ($dados as $key => $dado) {
			$janelasFlutuantesAccordion .= '
			<div class="panel box box-inverse">
			<div class="box-header with-border">
			<h4 class="box-title">
			<a data-toggle="collapse'.$janela.'" data-parent="#accordion_'.$janela.'" href="#collapse'.$janela.'" class="collapsed" aria-expanded="false"> <i class="'.$dado['icone'].'"> </i> '.$dado['menu'].'</a>
			</h4>
			</div>
			<div id="collapse'.$janela.'" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
			<div class="box-body">';

			if( $dado['link'] != 'vazio' ){
				$janelasFlutuantesAccordion .= FormularioRepositorie::formulario([
					'formulario' => 3,
					'tipo' => 'checkbox',
					'label' => $dado['menu'],
					'value' => $dado['id']
				]);
			}

			foreach ($dado['filhos'] as $key => $filhos) {
				$janelasFlutuantesAccordion .= FormularioRepositorie::formulario([
					'formulario' => 3,
					'tipo' => 'checkbox',
					'label' => $filhos['menu'],
					'value' => $filhos['id']
				]);
			}

			$janelasFlutuantesAccordion .= '</div>
			</div>
			</div>';
		}

		$janelasFlutuantesAccordion .= '</div></div></div></div>';

		return $janelasFlutuantesAccordion;
	}


	static function geraHashdeCadastro($users_id){
		try {
			$data = User::find($users_id);
			$novoCadastro = $data['pais'] . $data['id'] . $data['nome'] . $data['nascimento'] . $data['numero_documento'] . $data['created_at'];
			return md5($novoCadastro);
		} catch (Exception $e) {
			return md5($users_id);
		}
	}




	static function geraNumeroMatricula($qualCampo='chave_acesso'){
		$matCli = rand(1,999999999999);
		if(strlen($matCli) == 12 && $matCli != 9999){
			$listMat = Model('Users')::where($qualCampo, $matCli)->count();

			if($listMat > 0){
				return Componentes::geraNumeroMatricula();
			}else {
				return $matCli;
			}
		}else{
			return Componentes::geraNumeroMatricula();
		}
		exit;
	}


	static function geraChavePin($idUsuarioSolicitante='',$tamanho=6){
		$matCli = rand(1,999999);
		if(strlen($matCli) == $tamanho){
			$listMat = PinSolicitados::where('pin', $matCli)->count();

			if($listMat > 0){
				return Componentes::geraChavePin();
			}else {
				return $matCli;
			}
		}else{
			return Componentes::geraChavePin();
		}
		exit;
	}




	static function geraNumeroCarteira($tamanho=20){
		$matricula = str_shuffle('abcdefghijklmnopqrstuvyxwz0123456789');

		$novaMatricula = substr(str_shuffle($matricula),0,$tamanho);

		if(strlen($novaMatricula) == $tamanho ){
			$listMat = Carteiras::where('hash', $novaMatricula)->count();

			if($listMat > 0){
				return Componentes::geraNumeroCarteira();
			}else {
				return $novaMatricula;
			}
		}else{
			return Componentes::geraNumeroCarteira();
		}
		exit;
	}




	static function importaRegistrosAntigos(){
		$ini = 1;
		$fim = ApagarModelLocal::count();
		return $fim;

		while ($ini <= $fim) {

			$tabela_principal = ApagarModelLocal::find($ini);
			// return $tabela_principal;

			//	========== Grava na tabela users ==========
			$users['name'] = $tabela_principal['clNomeCompleto'];
			$users['email'] = $tabela_principal['clEmail'];
			$users['password'] = $tabela_principal['clPass'];
			$users['nivel'] = 'cli';
			$users['modulo'] = 'apis';
			$users['matricula'] = $tabela_principal['clMatricula'];
			$users['remember_token'] = $tabela_principal['remember_token'];
			$users['status_cadastro'] = 1;
			$users['email_validado'] = 1;

			$ultimo = User::create($users);
			$users['hash'] = Componentes::geraHashdeCadastro($ultimo['id']);
			User::find($ultimo['id'])->update($users);
			UsersHash::create(['users_id' => $ultimo['id'],'hash' => $users['hash']]);

			//	========== Grava na tabela users_dados ==========
			$users_dados['sexo'] = $tabela_principal['clSexo'];
			$users_dados['nascimento'] = $tabela_principal['clDataNasc'];
			$users_dados['pais'] = $tabela_principal['clEndPais'];
			$users_dados['filiacao_mae'] = $tabela_principal['clNomeMae'];
			$users_dados['tipo_cliente'] = $tabela_principal['clTipo'];
			$users_dados['observacoes'] = $tabela_principal['clObs'];
			$users_dados['idioma'] = ( $tabela_principal['clIdioma'] == 'ptbr' ? 1 : 2 );
			UsersDados::create($users_dados);

			//	========== Grava na tabela telefone ==========
			$users_telefone['users_id'] = $ultimo['id'];
			$users_telefone['telefone'] = $tabela_principal['clCelular'];
			$users_telefone['tipo'] = 20;
			$users_telefone['principal'] = 1;
			UsersTelefone::create($users_telefone);

			//	========== Grava na tabela telefone ==========
			$users_telefone['users_id'] = $ultimo['id'];
			$users_telefone['telefone'] = $tabela_principal['clTelefone'];
			$users_telefone['tipo'] = 21;
			UsersTelefone::create($users_telefone);

			//	========== Grava na tabela enderecos ==========
			$users_enderecos['users_id'] = $ultimo['id'];
			$users_enderecos['ativo'] = 1;
			$users_enderecos['cep'] = $tabela_principal['clEndCEP'];
			$users_enderecos['tipo_via'] = $tabela_principal['clEndTipVia'];
			$users_enderecos['logradouro'] = $tabela_principal['clEnd'];
			$users_enderecos['numero'] = $tabela_principal['clEndNr'];
			$users_enderecos['complemento'] = $tabela_principal['clEndComp'];
			$users_enderecos['bairro'] = $tabela_principal['clEndBairro'];
			$users_enderecos['cidade'] = $tabela_principal['clEndCidade'];
			$users_enderecos['estado'] = $tabela_principal['clEndEstado'];
			$users_enderecos['pais'] = $tabela_principal['clEndPais'];
			UsersEnderecos::create($users_enderecos);

			//	========== Grava na tabela enderecos ==========
			$users_documentos['users_id'] = $ultimo['id'];
			$users_documentos['tipo'] = $tabela_principal['clTpDoc'];
			$users_documentos['documento'] = $tabela_principal['clNrDoc'];
			$users_documentos['status'] = 1;
			UsersDocumentos::create($users_documentos);

			$ini++;
		}

		return 'importado com sucesso';
	}




	static function botaoModalPerson($id, $texto = ''){
		if( !empty($id) ){

			$texto = ( !empty($texto) ? $texto : trataTraducoes('confirma_acao') );

			return "
			function reativaVeiculo(".$id.") {
				swal({
					title: 'Aviso!',
					text: ".$texto.",
					type: 'warning',
					confirmButtonText: '".trataTraducoes('sim')."',
					showCancelButton: true,
					cancelButtonText: '".trataTraducoes('nao')."',
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					}).then((result) => {
						if( result.value ){
							uptDados(".$id.");
						}
						});
					}";
		}
	}




	static function geraImagem($formato='',$largura='',$altura='',$cor='',$conteudo=''){

		$formato = ( !empty($formato) ? $formato : 'png' );
		$largura = ( !empty($largura) ? $largura : 600 );
		$altura = ( !empty($altura) ? $altura : 1200 );
		$conteudo = ( !empty($conteudo) ? $conteudo : 'Texto de teste' );

		// Set the content-type
		header('Content-Type: image/png');

		// Create the image
		$im = imagecreatetruecolor($largura, $altura);

		// Create some colors
		$amarelo = imagecolorallocate($im, 244, 244, 182);
		$black = imagecolorallocate($im, 0, 0, 0);
		imagefilledrectangle($im, 0, 0, $largura, $altura, $amarelo);

		// The text to draw
		$text = trataTraducoes('comprovante_de_transfer');
		// Replace path by your own font path
		$font = ''.resource_path().('\arial.ttf').'';

		// Add some shadow to the text
		imagettftext($im, 20, 0, 11, 21, $amarelo, $font, $text);

		// Add the text
		imagettftext($im, 20, 0, 10, 20, $black, $font, $text);

		// Using imagepng() results in clearer text compared with imagejpeg()
		imagepng($im);
		imagedestroy($im);
		exit;

		// http://html2canvas.hertzen.com/
	}




	static function copiarTexto($botao = '', $campoCopiar = '', $mensagem = ''){
		$botao = ( !empty($botao) ? $botao : 'copiar' );
		$campoCopiar = ( !empty($botao) ? $botao : 'origem' );
		$mensagem = ( !empty($mensagem) ? $mensagem : trataTraducoes('Copiado para área de transferência') );
		return "
		$('#".$botao."').click(function(){
			        //Visto que o 'copy' copia o texto que estiver selecionado, talvez você queira colocar seu valor em um txt escondido
			$('#".$campoCopiar."').select();
			try {
				var ok = document.execCommand('copy');
				if (ok) { alert('".$mensagem."'); }
				} catch (e) {
					alert(e)
				}
				});
				";
	}




	static function botaoHabilitaDesabilita($data){
		$contador = ( !empty($data['contador']) ? $data['contador'] : 1 );
		$titulo1 = ( !empty($data['titulo1']) ? $data['titulo1'] : 'Opa!' );
		$titulo2 = ( !empty($data['titulo2']) ? $data['titulo2'] : 'Confirma a exclusão deste item?' );
		$icone = ( !empty($data['icone']) ? $data['icone'] : 'question' );
		$botao_confirmacao = ( !empty($data['botao_confirmacao']) ? $data['botao_confirmacao'] : trataTraducoes('sim') );
		$cor_botao_confirmacao = ( !empty($data['cor_botao_confirmacao']) ? $data['cor_botao_confirmacao'] : '#3085d6' );
		$botao_cancelamento = ( !empty($data['botao_cancelamento']) ? $data['botao_cancelamento'] : trataTraducoes('nao') );
		$cor_botao_cancelamento = ( !empty($data['cor_botao_cancelamento']) ? $data['cor_botao_cancelamento'] : '#d33' );
		$form_method = ( !empty($data['form_method']) ? $data['form_method'] : 'POST' );
		$titulo_toast = ( !empty($data['titulo_toast']) ? $data['titulo_toast'] : 'Item apagado com sucesso!' );
		$sub_titulo_toast = ( !empty($data['sub_titulo_toast']) ? $data['sub_titulo_toast'] : 'Tudo certo!' );
		$titulo_toast_pos = ( !empty($data['titulo_toast_pos']) ? $data['titulo_toast_pos'] : 'Removendo registro!' );
		$sub_titulo_toast_pos = ( !empty($data['sub_titulo_toast_pos']) ? $data['sub_titulo_toast_pos'] : 'Aguarde!' );

		$timeOut = ( !empty($data['timeOut']) ? $data['timeOut'] : 2000 );
		$showEasing = ( !empty($data['showEasing']) ? $data['showEasing'] : 'linear' );
		$showMethod = ( !empty($data['showMethod']) ? $data['showMethod'] : 'slideDown' );
		$closeMethod = ( !empty($data['closeMethod']) ? $data['closeMethod'] : 'fadeOut' );
		$closeDuration = ( !empty($data['closeDuration']) ? $data['closeDuration'] : 300 );
		$closeEasing = ( !empty($data['closeEasing']) ? $data['closeEasing'] : 'swing' );
		$complemento = '$this';

		return "
		<script>
		// ####################################################################################################
		$('body').on('click', '.botaoToaster', function () {
			botaoHabilitaDesabilita".$contador."($(this));
			});
		// ####################################################################################################
			function botaoHabilitaDesabilita".$contador."(".$complemento.") {
				swal({
					title: '".$titulo1."',
					text: '".$titulo1."',
					type: 'question',
					confirmButtonText: '".$botao_confirmacao."',
					showCancelButton: true,
					cancelButtonText: '".$botao_cancelamento."',
					confirmButtonColor: '".$cor_botao_confirmacao."',
					cancelButtonColor: '".$cor_botao_cancelamento."',
					}).then((result) => {
						if( result.value ){
							botaoHabilitaDesabilitaAcao(".$complemento.");
						}
						});
					}
		// ####################################################################################################
			function botaoHabilitaDesabilitaAcao(".$complemento."){
				$.ajax({
					url: ".$complemento.".data('url'),
					headers: {
						'X-CSRF-Token': $('meta[name=_token]').attr('content')
						},

						async: true,
						method: 'DELETE',
						data: ".$complemento.".serialize(),
						success: function (data) {
							toastr.clear();
							if( typeof tabela !== 'undefined' ) {
								tabela.ajax.reload();
							}
							if( typeof tabelaA !== 'undefined' ) {
								tabelaA.ajax.reload();
							}
							toastr.success(
							'".$titulo_toast."',
							'".$sub_titulo_toast."', {
								timeOut: ".$timeOut.",
								showEasing: '".$showEasing."',
								showMethod: '".$showMethod."',
								closeMethod: '".$closeMethod."',
								closeDuration: ".$closeDuration.",
								closeEasing: '".$closeEasing."',
								closeButton: false,
								progressBar: true,
							}
							);
							if( data.status != null ){
								window.location.reload();
							}

							if( data.redireciona != null ){
								window.location.href=data.redireciona;
							}
							},
							beforeSend: function () {
								toastr.info(
								'Removendo registro!',
								'Aguarde!', {
									showEasing: '".$showEasing."',
									showMethod: '".$showMethod."',
									closeMethod: '".$closeMethod."',
									closeDuration: ".$closeDuration.",
									closeEasing: '".$closeEasing."',
									closeButton: false,
									progressBar: true,
								}
								);
								},
								complete: function () {}
								});
			}
		// ####################################################################################################
		</script>
		";
	}


	static function atualizaCotacaoMoedas(){

		$chaves = Model('Currencylayer')::orderby('id')->get();
		foreach( $chaves as $consultaChaves ){
			$urlbase = "http://api.currencylayer.com/live?access_key=".$consultaChaves['access_key']."&source=USD&currencies=AED,AFN,ALL,AMD,ANG,AOA,ARS,AUD,AWG,AZN,BAM,BBD,BDT,BGN,BHD,BIF,BMD,BND,BOB,BRL,BSD,BTC,BTN,BWP,BYR,BZD,CAD,CDF,CHF,CLF,CLP,CNY,COP,CRC,CUC,CUP,CVE,CZK,DJF,DKK,DOP,DZD,EGP,ERN,ETB,EUR,FJD,FKP,GBP,GEL,GGP,GHS,GIP,GMD,GNF,GTQ,GYD,HKD,HNL,HRK,HTG,HUF,IDR,ILS,IMP,INR,IQD,IRR,ISK,JEP,JMD,JOD,JPY,KES,KGS,KHR,KMF,KPW,KRW,KWD,KYD,KZT,LAK,LBP,LKR,LRD,LSL,LTL,LVL,LYD,MAD,MDL,MGA,MKD,MMK,MNT,MOP,MRO,MUR,MVR,MWK,MXN,MYR,MZN,NAD,NGN,NIO,NOK,NPR,NZD,OMR,PAB,PEN,PGK,PHP,PKR,PLN,PYG,QAR,RON,RSD,RUB,RWF,SAR,SBD,SCR,SDG,SEK,SGD,SHP,SLL,SOS,SRD,STD,SVC,SYP,SZL,THB,TJS,TMT,TND,TOP,TRY,TTD,TWD,TZS,UAH,UGX,UYU,UZS,VEF,VND,VUV,WST,XAF,XAG,XAU,XCD,XDR,XOF,XPF,YER,ZAR,ZMK,ZMW,ZWL&format=1";

			$json_file = file_get_contents($urlbase);
			$json_str = json_decode($json_file, true);

			if( $json_str['success'] === true ){
				$retorno = $json_str;
			}
		}

		foreach( $json_str['quotes'] as $key => $data ){
		    MoedasConversoes::create([
		        'moeda_origem' => $json_str['source'],
		        'moeda_destino' => $key,
		        'valor' => $data,
		        'timestamp' => $json_str['timestamp'],
		        'access_key' => 'adc8612e34f5e05f3ad70739d69df1bc',
		        'json' => $json_file
		    ]);
		}
	}


	static function atualizaCriptoMoedas(){
		$urlbase = "https://blockchain.info/ticker";

		$json_file = file_get_contents($urlbase);
		$json_str = json_decode($json_file, true);

		$date = date_create();
		$timestamp = date_timestamp_get($date);

		foreach( $json_str as $key => $data ){
		    		    $dados = [
		        'moeda_origem' => $key,
		        'ultimo' => $data['last'],
		        'compra' => $data['buy'],
		        'venda' => $data['sell'],
		        'timestamp' => $timestamp,
		        'json' => $json_file 
		    ];
		    CriptoMoedasConversoes::create($dados);
		}
	}


	static function montaQuadrosSenhaFinanceira($data=''){

		$versaoAtual = versaoSistema();

		$qdade=( isset($data['qdade']) ? $data['qdade'] : 4 );
		$campoName=( isset($data['campoName']) ? $data['campoName'] : 'nova_senha_financeira' ).'_'.$versaoAtual;
		// $campoNameNull = ( isset($data['campoNameNull']) ? $data['campoNameNull'] : explode('_',$campoName)[0] . '_' . explode('_',$campoName)[1] );
		$campoNameNull = ( isset($data['campoNameNull']) ? $data['campoNameNull'] : str_replace('nova_', '', $campoName) );
		$maxlength=( isset($data['maxlength']) ? $data['maxlength'] : 1 );
		$tipo=( isset($data['tipo']) ? $data['tipo'] : 'password' );
		$tamanho=( isset($data['tamanho']) ? $data['tamanho'] : 10 );
		$tamanhoCheio=( isset($data['tamanhoCheio']) ? $data['tamanhoCheio'] : 1 );
		$valor_inicial=( isset($data['valor_inicial']) ? str_split($data['valor_inicial']) : Null );

		$larguraCampos = round((100 / $qdade),2);
		if( $larguraCampos*$qdade > 100 ){
			$larguraCampos = round((99 / $qdade),2);
		}

		$campos = '';
		if( $tamanhoCheio === 1 ){
		$campos .= '<div class="form-group row">';
		$campos .= '<label class="col-sm-2 col-form-label">'.trataTraducoes($campoNameNull).'</label>';
		}
		$campos .= '<div class="col-sm-'.$tamanho.'">';
		$campos .= '<div class="row conteutoparapular_'.$versaoAtual.'" style="padding:0px 15px;">';

		$inicio = 1;
		while ($inicio <= $qdade) {
		$campos .= '<input '. ($inicio===1 ? ' autofocus="autofocus" ' : '') .' pattern="([0-9]{1})" required="required" value="'.$valor_inicial[$inicio-1].'" maxlength="'.$maxlength.'" name="'.$campoName.'[]" id="'.$campoName.'[]" type="'.$tipo.'" class="form-control '.$campoName.'_salta" placeholder="" style="float: left; width: '.$larguraCampos.'% !important; text-align: center !important;" autocomplete="off">
					';
			$inicio++;
		}

		$campos .= '</div>
					</div>
						<script type="text/javascript">
							var conteutoparapular_'.$versaoAtual.' = document.getElementsByClassName("conteutoparapular_'.$versaoAtual.'")[0];
							conteutoparapular_'.$versaoAtual.'.onkeyup = function(e) {
								var target = e.srcElement;
								var maxLength = parseInt(target.attributes["maxlength"].value, 10);
								var myLength = target.value.length;
								if (myLength >= maxLength) {
									var next = target;
									while (next = next.nextElementSibling) {
										if (next == null)
											break;
										if (next.tagName.toLowerCase() == "input") {
											next.focus();
											break;
										}
									}
								}
							}
						</script>';
		if( $tamanhoCheio === 1 ){
		$campos .= '</div>';
		}


		return $campos;
	}
};