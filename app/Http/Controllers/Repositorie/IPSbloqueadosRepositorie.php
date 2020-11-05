<?php
namespace App\Http\Controllers\Repositorie;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use App\Repositories\Tratamentos;
use App\Repositories\Componentes;

class IPSbloqueadosRepositorie{

    CONST url = '/ips_bloqueados';

    static function index(){
        $dados['titulo_pagina'] = IPSbloqueadosRepositorie::url;
        $dados['rota_geral'] = IPSbloqueadosRepositorie::url;
        $dados['botao_datatable_padrao'] = 'create';
        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>20,'label'=>'IP','nome_no_banco_de_dados'=>'ip',],
            ['tabela'=>15,'label'=>'Região','nome_no_banco_de_dados'=>'regiao',],
            ['tabela'=>40,'label'=>'Motivo','nome_no_banco_de_dados'=>'motivo_bloqueio',],
            ['tabela'=>15,'label'=>'Bloqueado por','nome_no_banco_de_dados'=>'bloqueado_por',],
            ['tabela'=>5,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];
        return compact('dados','datatable');
    }

    static function show($id){
        if( !empty($_GET['acao']) ){
            Model('IpsBloqueados')::destroy($id);
            return redirect(IPSbloqueadosRepositorie::url)->with('mensagem', 'Conteúdo removido com sucesso!');
        }

        $data = Model('IpsBloqueados')::get();
        foreach( $data as $key => $d ){
            $d['contador'] = ($key+1);
            $d['acoes'] = Componentes::MontaBotao(['cor'=>'danger','url'=>IPSbloqueadosRepositorie::url.'/'.$d['id'].'?acao=remove','tipo'=>'LinkGeralIcone','icone'=>'fa fa-trash','classHref'=>'botaoRemover']);
        }
        return compact('data');
    }

    static function createorEdit($id=''){
        $dados = IPSbloqueadosRepositorie::index()['dados'];
        if( !empty($id) ){
            $data = Model('IpsBloqueados')::find($id);
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
            Model('IpsBloqueados')::find($data['id'])->update($dados);
        } else {
            Model('IpsBloqueados')::create($data);
        }
        return redirect(IPSbloqueadosRepositorie::url)->with('mensagem', 'Conteúdo atualizado com sucesso!');
    }

    static function edit($id){
        return 'edit';
        return IPSbloqueadosRepositorie::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return 'destroy';
        return Users::destroy($id);
    }
};