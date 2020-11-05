<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;

class ApiConsultaCripto extends Controller{
    public function cripto($qualMoeda,$chaveAcesso=''){

        // verifica se o ip não está bloqueado para consultar
        $qualIpConsulta = pegaIPUsuario();
        if( is_array($qualIpConsulta) ){
            return $qualIpConsulta[0];
        }

        atualizaCriptoMoedas();

        // pega configurações globais para gerenciar a consulta
        $configuracoesGlobais = configuracoesGlobais();
        $tempoConsulta = $configuracoesGlobais['tempo_intervalo_entre_consultas_gratuitas'];
                    // tempo_intervalo_entre_consultas_gratuitas
                    // tempo_intervalo_entre_consultas_pagas

        // se a chave de acesso for informada
        if( !empty($chaveAcesso) ){
            // consulta qual usuário está consultando
            return $this->consultaUsuarioPagante($qualMoeda,$qualIpConsulta,$chaveAcesso,$configuracoesGlobais);
        }

        // verifica o ip e o tempo da última consulta para liberar uma nova consulta
        return $this->consultaUsuarioFree($qualMoeda,$qualIpConsulta, $configuracoesGlobais);
    }
















    public function consultaUsuarioPagante($qualMoeda,$qualIpConsulta,$chaveAcesso,$configuracoesGlobais){
        $quemConsulta = Model('Users')::where('chave_acesso', $chaveAcesso)->count();
        if( $quemConsulta === 1 ){
            $qualUsuarioConsultou = Model('UsersConsultas')::where('users_key', $chaveAcesso)->where('consulta_entrada', $qualMoeda)->orderby('id','desc')->first();
            $qualUsuarioConsultou = ( !empty($qualUsuarioConsultou) ? $qualUsuarioConsultou['data_ultima_consulta'] : 0 );

            if( (int)$qualUsuarioConsultou < timestampAtual() ){
                return $this->retornaConsulta($qualMoeda,$chaveAcesso);
            }
            return ['error' => trataTraducoes('Consultas devem ter um intervalo maior que ') . $configuracoesGlobais['tempo_intervalo_entre_consultas_pagas'] . ' segundos'];
        }
    }
















    public function consultaUsuarioFree($qualMoeda,$qualIpConsulta,$configuracoesGlobais){
        $configuracoesGlobais = configuracoesGlobais();
        $tempoConsulta = $configuracoesGlobais['tempo_intervalo_entre_consultas_gratuitas'];
        $qualUsuarioConsultou = Model('UsersConsultas')::where('users_key', 'IP|'.$qualIpConsulta)->where('consulta_entrada', $qualMoeda)->orderby('id','desc')->first();

        $permite = 0;
        if( empty($qualUsuarioConsultou) ){
            $permite = 1;
            if( ($qualUsuarioConsultou['data_ultima_consulta'] + $configuracoesGlobais['tempo_intervalo_entre_consultas_gratuitas']) > timestampAtual() ){
                $permite = 1;
            }
        }

        if( $permite === 1 ){
            return $this->retornaConsulta($qualMoeda,'IP|'.$qualIpConsulta);
        }
        return ['error' => trataTraducoes('Limite de consultas grátis por IP excedido!')];
    }
















    public function retornaConsulta($qualMoeda,$qualIpConsulta){
        switch ($qualMoeda) {
            case 'cripto':
                $search = Model('CriptomoedasConversoes')::orderby('id', 'desc')->first();
                $search = ( !empty($search) ? json_decode($search['json'],true) : [] );
                break;

            case 'coins':
                $search = Model('MoedasConversoes')::orderby('id', 'desc')->first();
                $search = ( !empty($search) ? json_decode($search['json'],true)['quotes'] : [] );
                break;

            default:
                $search = [];
                break;
        }

        Model('UsersConsultas')::create(['users_key' => $qualIpConsulta,'data_ultima_consulta' => timestampAtual(),'consulta_entrada' => $qualMoeda,'retorno_solicitado' => json_encode($search)]);

        return $search;
    }
}