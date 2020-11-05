<?php
namespace App\Http\Controllers\Repositorie;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use App\Repositories\Tratamentos;
use App\Repositories\Componentes;

class CadastrosAdministradoresRepositorie{

    CONST url = '/cadastros/administradores';

    static function index(){
        $dados['titulo_pagina'] = CadastrosAdministradoresRepositorie::url;
        $dados['rota_geral'] = CadastrosAdministradoresRepositorie::url;
        $dados['botao_datatable_padrao'] = 'create';
        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>30,'label'=>'Nome','nome_no_banco_de_dados'=>'name',],
            ['tabela'=>55,'label'=>'Email','nome_no_banco_de_dados'=>'email',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];
        return compact('dados','datatable');
    }

    static function show($id){
        if( !empty($_GET['acao']) ){
            Model('Users')::destroy($id);
            return redirect(CadastrosAdministradoresRepositorie::url)->with('mensagem', 'Conteúdo removido com sucesso!');
        }

        $data = Model('Users')::where('nivel','adm')->get();
        foreach( $data as $key => $d ){
            $d['contador'] = ($key+1);
            $d['acoes'] = Componentes::MontaBotao(['cor'=>'danger','url'=>CadastrosAdministradoresRepositorie::url.'/'.$d['id'].'?acao=remove','tipo'=>'LinkGeralIcone','icone'=>'fa fa-trash','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>CadastrosAdministradoresRepositorie::url.'/'.$d['id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil',]);
        }
        return compact('data');
    }

    static function createorEdit($id=''){
        $dados = CadastrosAdministradoresRepositorie::index()['dados'];
        if( !empty($id) ){
            $data = Model('Users')::find($id);
        }

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Nome',
            'nome_no_banco_de_dados' => 'name',
            'required'=>1,
            'valor_inicial' => ( !empty($data) ? $data['name'] : Null ),
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
            'required'=>( !empty($id) ? 0 : 1 ),
            'tipo'=>'password',
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
        if( $data['senha'] != $data['re-senha'] ){
            return back()->with('mensagem', ['Senha e confirmação de senha estão incorretas','warning']);
        } else {
            $data['password'] = bcrypt($data['senha']);
            unset($data['senha']);
            unset($data['re-senha']);
        }

        if( !empty($data['id']) ){
            $dados = $data;
            unset($dados['id']);
            Model('Users')::find($data['id'])->update($dados);
        } else {
            $data['nivel'] = 'adm';
            Model('Users')::create($data);
        }
        return redirect(CadastrosAdministradoresRepositorie::url)->with('mensagem', 'Conteúdo atualizado com sucesso!');
    }

    static function edit($id){
        return 'edit';
        return CadastrosAdministradoresRepositorie::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return 'destroy';
        return Users::destroy($id);
    }
};