<?php
namespace App\Http\Controllers\Repositorie;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use App\Repositories\Tratamentos;
use App\Repositories\Componentes;

class MoedasCriptomoedasRepositorie{

    CONST url = '/moedas/criptomoedas';

    static function index(){
        $dados['titulo_pagina'] = MoedasCriptomoedasRepositorie::url;
        $dados['rota_geral'] = MoedasCriptomoedasRepositorie::url;
        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>10,'label'=>'Data','nome_no_banco_de_dados'=>'data_consulta',],
            ['tabela'=>10,'label'=>'Total','nome_no_banco_de_dados'=>'total_registros',],
            ['tabela'=>75,'label'=>'Cotação','nome_no_banco_de_dados'=>'cotacao',],
        ];
        return compact('dados','datatable');
    }

    static function show($id){
        $consulta = Model('CriptomoedasConversoes')::select('timestamp')->groupby('timestamp')->orderby('timestamp','desc')->get();

        $data = [];
        foreach( $consulta as $key => $d ){
            $atual = Model('CriptomoedasConversoes')::where('timestamp', $d['timestamp'])->get();

            $cotacao = '';
            $cotacao = '<div class="row">';
            foreach( $atual as $key1 => $percorre ){
                $corFundo = ( $key1%2 === 0 ? 'bg-info' : 'bg-default' );

                $cotacao .= '<div class="col-md-1 text-right '.$corFundo.'">'.$percorre['moeda_origem'].'</div>';
                $cotacao .= '<div class="col-md-3 text-right '.$corFundo.'">'.$percorre['venda'].'</div>';
            }
            $cotacao .= '</div>';

            $data[$key]['contador'] = ($key+1);
            $data[$key]['data_consulta'] = date('d/m/Y h:m:s', $d['timestamp']);
            $data[$key]['total_registros'] = $atual->count();
            $data[$key]['cotacao'] = $cotacao;
        }
        return compact('data');
    }

    static function createorEdit($id=''){
        $dados = MoedasCriptomoedasRepositorie::index()['dados'];
        if( !empty($id) ){
            $data = Model('CriptomoedasConversoes')::find($id);
        }

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'IP',
            'nome_no_banco_de_dados' => 'ip',
            'required'=>1,
            'valor_inicial' => ( !empty($data) ? $data['ip'] : Null ),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Região',
            'nome_no_banco_de_dados' => 'regiao',
            'required'=>1,
            'valor_inicial' => ( !empty($data) ? $data['regiao'] : Null ),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Motivo de bloqueio',
            'nome_no_banco_de_dados' => 'motivo_bloqueio',
            'required'=>1,
            'valor_inicial' => ( !empty($data) ? $data['motivo_bloqueio'] : Null ),
        ]);

        $formulario[] = Componentes::MontaBotao([
            'tipo' => 'BotaoModalSalvar',
            'size'=>10,
            'icone' => 'fa fa-save',
            'titulo' => 'salvar',
            'cor' => 'primary'
        ]);

        if( !empty($id) ){
            $formulario[] = FormularioRepositorie::formulario([
                'formulario' => 12,
                'nome_no_banco_de_dados' => 'id',
                'valor_inicial' => $id,
                'tipo' => 'hidden'
            ]);
        }

        return compact('dados','formulario');
    }
    static function store($data){
        $data['bloqueado_por'] = Auth()->user()->id;

        if( !empty($data['id']) ){
            $dados = $data;
            unset($dados['id']);
            Model('CriptomoedasConversoes')::find($data['id'])->update($dados);
        } else {
            Model('CriptomoedasConversoes')::create($data);
        }
        return redirect(MoedasCriptomoedasRepositorie::url)->with('mensagem', 'Conteúdo atualizado com sucesso!');
    }

    static function edit($id){
        return 'edit';
        return MoedasCriptomoedasRepositorie::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return 'destroy';
        return Users::destroy($id);
    }
};