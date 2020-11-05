<?php
namespace App\Http\Controllers\Repositorie;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use App\Repositories\Tratamentos;
use App\Repositories\Componentes;

class CurrencylayerRepositorie{

    CONST url = '/currencylayer';

    static function index(){
        $dados['titulo_pagina'] = CurrencylayerRepositorie::url;
        $dados['rota_geral'] = CurrencylayerRepositorie::url;
        $dados['botao_datatable_padrao'] = 'create';
        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>45,'label'=>'Chave de acesso','nome_no_banco_de_dados'=>'access_key',],
            ['tabela'=>25,'label'=>'Email','nome_no_banco_de_dados'=>'email',],
            ['tabela'=>15,'label'=>'Senha','nome_no_banco_de_dados'=>'senha',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        return compact('dados','datatable');
    }

    static function show($id){
        if( !empty($_GET['acao']) ){
            Model('Currencylayer')::destroy($id);
            return redirect(CurrencylayerRepositorie::url)->with('mensagem', 'Conteúdo removido com sucesso!');
        }

        $data = Model('Currencylayer')::get();
        foreach( $data as $key => $d ){
            $d['contador'] = ($key+1);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>CurrencylayerRepositorie::url.'/'.$d['id'].'?acao=remove','tipo'=>'LinkGeralIcone','icone'=>'fa fa-trash','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>CurrencylayerRepositorie::url.'/'.$d['id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil',]);
        }
        return compact('data');
    }

    static function createorEdit($id=''){
        $dados = CurrencylayerRepositorie::index()['dados'];
        if( !empty($id) ){
            $data = Model('Currencylayer')::find($id);
        }

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Chave de acesso',
            'nome_no_banco_de_dados' => 'access_key',
            'required'=>1,
            'valor_inicial' => ( !empty($data) ? $data['access_key'] : Null ),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Email',
            'nome_no_banco_de_dados' => 'email',
            'required'=>1,
            'valor_inicial' => ( !empty($data) ? $data['email'] : Null ),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Senha',
            'nome_no_banco_de_dados' => 'senha',
            'required'=>1,
            'valor_inicial' => ( !empty($data) ? $data['senha'] : Null ),
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
        if( !empty($data['id']) ){
            $dados = $data;
            unset($dados['id']);
            Model('Currencylayer')::find($data['id'])->update($dados);
        } else {
            return 'cria novo';
            Model('Currencylayer')::create($data);
        }
        return redirect(CurrencylayerRepositorie::url)->with('mensagem', 'Conteúdo atualizado com sucesso!');
    }

    static function edit($id){
        return 'edit';
        return CurrencylayerRepositorie::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return 'destroy';
        return Users::destroy($id);
    }
};