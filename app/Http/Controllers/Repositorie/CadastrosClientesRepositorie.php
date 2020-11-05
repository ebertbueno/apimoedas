<?php
namespace App\Http\Controllers\Repositorie;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use App\Repositories\Tratamentos;
use App\Repositories\Componentes;

class CadastrosClientesRepositorie{

    CONST url = '/cadastros/clientes';

    static function index(){
        $dados['titulo_pagina'] = CadastrosClientesRepositorie::url;
        $dados['rota_geral'] = CadastrosClientesRepositorie::url;
        $dados['botao_datatable_padrao'] = 'create';
        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>20,'label'=>'Nome','nome_no_banco_de_dados'=>'name',],
            ['tabela'=>35,'label'=>'Email','nome_no_banco_de_dados'=>'email',],
            ['tabela'=>25,'label'=>'Chave de acesso','nome_no_banco_de_dados'=>'chave_acesso',],
            ['tabela'=>5,'label'=>'Copiar','nome_no_banco_de_dados'=>'copiar',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];
        return compact('dados','datatable');
    }

    static function show($id){
        if( !empty($_GET['acao']) ){
            Model('Users')::destroy($id);
            return redirect(CadastrosClientesRepositorie::url)->with('mensagem', 'Conteúdo removido com sucesso!');
        }

        $data = Model('Users')::where('nivel','cli')->get();
        foreach( $data as $key => $d ){
            $d['contador'] = ($key+1);
            $d['copiar'] = copiatesteConteudo(['conteudo'=>$d['chave_acesso'],'label'=>' ']);
            $d['acoes'] = Componentes::MontaBotao(['cor'=>'danger','url'=>CadastrosClientesRepositorie::url.'/'.$d['id'].'?acao=remove','tipo'=>'LinkGeralIcone','icone'=>'fa fa-trash','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>CadastrosClientesRepositorie::url.'/'.$d['id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil',]);
        }
        return compact('data');
    }

    static function createorEdit($id=''){
        $dados = CadastrosClientesRepositorie::index()['dados'];
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
            'label' => 'Chave de acesso',
            'nome_no_banco_de_dados' => 'chave_acesso',
            'readonly'=>1,
            'valor_inicial' => Componentes::geraNumeroMatricula(),
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
            Model('Users')::find($data['id'])->update($dados);
        } else {
            $data['nivel'] = 'cli';
            Model('Users')::create($data);
        }
        return redirect(CadastrosClientesRepositorie::url)->with('mensagem', 'Conteúdo atualizado com sucesso!');
    }

    static function edit($id){
        return 'edit';
        return CadastrosClientesRepositorie::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return 'destroy';
        return Users::destroy($id);
    }
};