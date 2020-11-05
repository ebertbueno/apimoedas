<?php
namespace App\Repositories;

use App\Repositories\Componentes;
use App\Repositories\Tratamentos;
use Mail;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\PinSolicitados;

use App\Models\Users;
/*
backend.1.emails.corpo_email		=	layout externo, para uso no site
backend.1.emails.novo_cadastro		=	layout para email
*/

class SendRepositorie{

	CONST formatacaoPinEmail = ' style="text-align: center !important; font-size: 50pt !important;"';

	static function index($qualFuncao, $data = ''){

		$hash = ( !empty($hash) ? $hash : Null );
		$data = ( !empty($data) ? $data : Null );
		$data = SendRepositorie::$qualFuncao($data);

		$envia = ( !empty($data['envia']) ? $data['envia'] : 0 );

		if( (int)$envia === 1 ){
			try {
				Mail::send($data['layout'], ['data' => $data], function ($m) use ($data) 
				{
					$m->from('tradoniex@tradoniex.com', site_id()['name']);
					$m->to(( !empty($data['email']) ? $data['email'] : $_SESSION['email'] ))->subject($data['assunto']);
					$m->bcc('tradoniex@tradoniex.com')->subject('Email de - ' . ( !empty($data['email']) ? $data['email'] : $_SESSION['email'] ));
				}
				);
			} catch (Exception $e) {
    			// refatorar - criar um notificador de erros
			}
			return redirect(url('/check_register'));
		} else {
			if( !empty($data['email_nao_encontrado']) ){
				return $data;
			}
			return view($data['layout'],['data'=>$data]);
		}
	}




	static function cadastroConcluido($data){
		return [
			'envia' => 1,
			'layout' => 'temas.'.site_id()['template'].'.email.cadastroConcluido',
			'logotipo' => url('/'.site_id()['id'].'/logotipo_intgracao.png'),
			'conteudo' => 'Enviamos um e-mail de confirmação para o endereço <strong>'.$data['email'].'</strong>.<br><br>Para finalizarmos a abertura da sua conta, clique no link que você recebeu e confirme o seu cadastro.<br><br>Atenciosamente.<br>Equipe '.site_id()['name'],
			'rodape' => site_id()['name'],
			'assunto' => 'Confirmação de cadastro',
		];
	}




	static function enviodeEmail($data){
		return [
			'envia' => 1,
			'layout' => 'temas.'.site_id()['template'].'.email.enviodeEmail',
			'logotipo' => url('/'.site_id()['id'].'/logotipo_intgracao.png'),
			'conteudo' => 'É com grande satisfação que recebemos a sua solicitação de abertura de conta na nossa plataforma!<br><br>Para finalizarmos o seu cadastro e a abertura da sua conta, por favor, clique no link abaixo:<br><p style="text-align: center"><a href="'.url('/validate_your_email/'.$data['blockchain'].'').'">Confirmar meu email</a></p><br>Atenciosamente!<br>Equipe '.site_id()['name'],
			'rodape' => site_id()['name'],
			'assunto' => 'Bem vindo',
		];
	}




	static function emailClicado($hash){

		if( Auth()->check() ){
			Auth::logout();
		}

		$qualUser = UsersFrontEnd::where('hash', $hash)->where('email_validado', 0)->first();
		$qualUser = ( !empty($qualUser) ? $qualUser['id'] : 0 );

		if( $qualUser != 0 ){

			$consultaOrigem = PinSolicitados::where('users_id', $qualUser)->where('modulo', site_id()['modulo'])->orderby('id', 'desc')->first();
			if( empty($consultaOrigem) ){
				$consultaOrigem = PinSolicitados::create([
					'emp_id' => site_id()['id'],
					'users_id' => $qualUser,
					'modulo' => site_id()['modulo'],
					'nivel' => 'cli',
				]);
			}

			UsersFrontEnd::find($qualUser)->update(['email_validado' => 1]);
			Auth::loginUsingId($qualUser);

			return [
				'envia' => 0,
				'layout' => 'temas.'.site_id()['template'].'.email.emailClicado',
				'logotipo' => url('/'.site_id()['id'].'/logotipo_intgracao.png'),
				'conteudo' => '<p style="text-align: center">Seu cadastro foi ativado com sucesso.<br><br><a href="/backend/home'.'">Clique aqui</a> para acessar a plataforma',
				'rodape' => site_id()['name'],
				'assunto' => 'Ativação de cadastro',
			];
		}

		return [
			'envia' => 0,
			'layout' => 'temas.'.site_id()['template'].'.email.emailClicado',
			'logotipo' => url('/'.site_id()['id'].'/logotipo_intgracao.png'),
			'conteudo' => '<p style="text-align: center">Seu cadastro já foi ativado!<br><br><a href="/login">Clique aqui</a> para efetuar login e acessar a plataforma.',
			'rodape' => site_id()['name'],
			'assunto' => 'Email já validado',
		];


	}




	static function acessoSemValidarConta($hash = ''){

		$hash = ( !empty($hash) ? $hash : Null );

		$qualUser = UsersFrontEnd::where('remember_token', $hash)->get();
		$qualUser = ( count($qualUser) != 1 ? 0 : $qualUser[0]['id'] );

		return [
			'envia' => 0,
			'layout' => 'temas.'.site_id()['template'].'.email.acessoSemValidarConta',
			'logotipo' => url('/'.site_id()['id'].'/logotipo_intgracao.png'),
			'conteudo' => 'Sua conta ainda não foi validada em nossa plataforma.<br><br>Pedimos que verifique sua caixa de email (verifique também sua caixa de spam) e clique no link enviado para a ativação de sua conta.<br><br><a href="'.url('/').'">Voltar</a>',
			'rodape' => site_id()['name'],
			'assunto' => 'Conta não validada',
		];
	}




	static function envio_pin_primeiro_cadastro($data=''){

		if( !empty(Auth()->user()->id) ){
			$idUsuarioSolicitante = Auth()->user()->id;
		} else {
			$retorno = Users::where('email', $_SESSION['email'])->first();
			$idUsuarioSolicitante = $retorno['id'];
		}

		$consultaPIN = PinSolicitados::where('users_id',$idUsuarioSolicitante)->orderby('id')->first();
		if( !empty($consultaPIN) ){
			$numeroPIN = $consultaPIN['pin'];
		} else {
			$numeroPIN = ( !empty($_SESSION['financeiro']['pin']) ? $_SESSION['financeiro']['pin'] : Componentes::geraChavePin($idUsuarioSolicitante) );
		}

		$retorno = PinSolicitados::create([
			'users_id' => $idUsuarioSolicitante,
			'tabela' => 'financeiro',
			'pin' => $numeroPIN,
			'validade' => date('Y-m-d h:m:s', strtotime('+1 days')),
			'url_origem' => urlCompleta(),
		]);

		$data['idioma'] = ( !empty($data['idioma']) ? $data['idioma'] : 'en' );

		return [
			'envia' => ( !is_null($data['envia']) ? $data['envia'] : 1 ),
			'layout' => ( !empty($data['layout']) ? $data['layout'] : 'temas.'.site_id()['template'].'.email.enviodePINparaemail' ),
			'assunto' => traducoesSistema('valide_sua_conta', $data['idioma']),
			'titulo_corpo_email' => traducoesSistema('titulo_corpo_email_codigo_verificacao', $data['idioma']),
			'subtitulo_corpo_email' => traducoesSistema('subtitulo_email_codigo_verificacao', $data['idioma']),
			'corpo_email' => traducoesSistema('corpo_email_codigo_verificacao', $data['idioma'],['||numeroPIN||' => $numeroPIN,'||mostraNome||'=>'']),
			'rodape_email' => traducoesSistema('rodape_email_padrao', $data['idioma'],['||site_id_name||' => site_id()['name']]),
		];
	}




	static function solicita_confirmacao_pin_por_email($data=''){

		$ultimo = Model('UsersPin')::withTrashed()->orderby('id','desc')->first();

		return [
			'envia' => ( !is_null($data['envia']) ? $data['envia'] : 1 ),
			'layout' => ( !empty($data['layout']) ? $data['layout'] : 'temas.'.site_id()['template'].'.email.enviodePINparaemail' ),
			'assunto' => traducoesSistema('valide_sua_conta'),
			'email' => Auth()->user()->email,
			'titulo_corpo_email' => traducoesSistema('titulo_corpo_confirmacao_pin_por_email'),
			'subtitulo_corpo_email' => traducoesSistema('subtitulo_confirmacao_pin_por_email'),
			'corpo_email' => traducoesSistema('corpo_email_confirmacao_pin_por_email',idiomaPadrao(),[
				'||mostraNome||'=>Auth()->user()->name,
				'||linkConfirmacao||'=>url('/reset_pin/'.$ultimo['hash_confirma']),
				'||linkNegacao||'=>url('/reset_pin/'.$ultimo['hash_nega']),
			]),

			'rodape_email' => traducoesSistema('rodape_email_padrao',idiomaPadrao(),['||site_id_name||' => site_id()['name']]),
		];
	}






	static function boas_vindas_primeiro_cadastro($data=''){

		if( !empty(Auth()->user()->id) ){
			$idUsuarioSolicitante = Auth()->user()->id;
		} else {
			$retorno = Users::where('email', $_SESSION['email'])->first();
			$idUsuarioSolicitante = $retorno['id'];
		}

		$consultaPIN = PinSolicitados::where('users_id',$idUsuarioSolicitante)->orderby('id')->first();
		if( !empty($consultaPIN) ){
			$numeroPIN = $consultaPIN['pin'];
		} else {
			$numeroPIN = ( !empty($_SESSION['financeiro']['pin']) ? $_SESSION['financeiro']['pin'] : Componentes::geraChavePin($idUsuarioSolicitante) );
		}

		$retorno = PinSolicitados::create([
			'users_id' => $idUsuarioSolicitante,
			'tabela' => 'financeiro',
			'pin' => $numeroPIN,
			'validade' => date('Y-m-d h:m:s', strtotime('+1 days')),
			'url_origem' => urlCompleta(),
		]);

		return [
			'envia' => ( !is_null($data['envia']) ? $data['envia'] : 1 ),
			'layout' => ( !empty($data['layout']) ? $data['layout'] : 'temas.'.site_id()['template'].'.email.enviodePINparaemail' ),
			'assunto' => traducoesSistema('bem_vindo'),
			'titulo_corpo_email' => traducoesSistema('bem_vindo'),
			'subtitulo_corpo_email' => traducoesSistema('cadastro_concluido'),
			'corpo_email' => traducoesSistema('texto_de_saudacao'),
			'rodape_email' => traducoesSistema('rodape_email_padrao',idiomaPadrao(),['||site_id_name||' => site_id()['name']]),
		];
	}




	static function esqueciMinhaSenha($data){

		$email = $data['email'];
		$consulta = Model('UserSemRelacionamentos')::where('email', $email)->first();

		if( empty($consulta) ){
			return ['email_nao_encontrado' => 'erro'];
		}

		$hash = Tratamentos::blockchain(compact('consulta'),'sha512');
		Model('UsersForgotPassword')::where('users_id',$consulta['id'])->delete();
		Model('UsersForgotPassword')::create(['users_id' => $consulta['id'],'hash'=>$hash]);

		return [
			'envia' => 1,
			'email' => $data['email'],
			'layout' => 'temas.'.site_id()['template'].'.email.esqueciMinhaSenha',
			'assunto' => traducoesSistema('valide_sua_conta'),
			'titulo_corpo_email' => traducoesSistema('titulo_corpo_esqueci_minha_senha'),
			'subtitulo_corpo_email' => traducoesSistema('subtitulo_esqueci_minha_senha'),
			'corpo_email' => traducoesSistema('corpo_esqueci_minha_senha',idiomaPadrao(),['||email||' => traducoesSistema($data['email']),'||url||' => url('/forgot_password/'.$hash.'')]),
			'rodape_email' => traducoesSistema('rodape_email_padrao',idiomaPadrao(),['||site_id_name||' => site_id()['name']]),
		];
	}


	static function solicita_confirmacao_carteira_btc($data=''){

		$ultimo = Model('CarteirasExternas')::withTrashed()->where('id',$data['id'])->first();

		return [
			'envia' => ( !is_null($data['envia']) ? $data['envia'] : 1 ),
			'layout' => ( !empty($data['layout']) ? $data['layout'] : 'temas.'.site_id()['template'].'.email.enviodePINparaemail' ),
			'assunto' => traducoesSistema('valide_sua_carteira_btc'),
			'email' => Auth()->user()->email,
			'titulo_corpo_email' => traducoesSistema('titulo_corpo_confirmacao_carteira_por_email'),
			'subtitulo_corpo_email' => traducoesSistema('subtitulo_confirmacao_pin_por_email'),
			'corpo_email' => traducoesSistema('corpo_email_confirmacao_carteira_por_email',idiomaPadrao(),[
				'||mostraNome||'=>Auth()->user()->name,
				'||linkConfirmacao||'=>url('/registrations/aproveCart/'.$ultimo['ref']),
				'||linkNegacao||'=>url('/registrations/resetCart/'.$ultimo['ref']),
				'||hashCarteira||' => $data['hash'],
			]),
			
			'rodape_email' => traducoesSistema('rodape_email_padrao',idiomaPadrao(),['||site_id_name||' => site_id()['name']]),
		];
	}
};