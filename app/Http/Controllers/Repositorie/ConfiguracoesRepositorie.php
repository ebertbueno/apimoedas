<?php
namespace App\Http\Controllers\Repositorie;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use App\Repositories\Tratamentos;
use App\Repositories\Componentes;

class ConfiguracoesRepositorie{

    CONST url = 'configuracoes';

    static function index(){
        $dados['titulo_pagina'] = ConfiguracoesRepositorie::url;
        $dados['rota_geral'] = ConfiguracoesRepositorie::url;
        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>50,'label'=>'nome','nome_no_banco_de_dados'=>'name',],
            ['tabela'=>35,'label'=>'email','nome_no_banco_de_dados'=>'email',],
            ['tabela'=>10,'label'=>'acoes','nome_no_banco_de_dados'=>'acoes',]
        ];

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Tempo de invertevalo entre consultas gratuitas',
            'nome_no_banco_de_dados' => 'tempo_intervalo_entre_consultas_gratuitas',
            'required'=>1,
            'valor_inicial' => Model('Configuracoes')::where('chave', 'tempo_intervalo_entre_consultas_gratuitas')->first()['valor'],
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Tempo de invertevalo entre consultas pagas',
            'nome_no_banco_de_dados' => 'tempo_intervalo_entre_consultas_pagas',
            'required'=>1,
            'valor_inicial' => Model('Configuracoes')::where('chave', 'tempo_intervalo_entre_consultas_pagas')->first()['valor'],
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Tempo de invertevalo entre atualizações automáticas',
            'nome_no_banco_de_dados' => 'tempo_intervalo_entre_atualizacao',
            'required'=>1,
            'valor_inicial' => Model('Configuracoes')::where('chave', 'tempo_intervalo_entre_atualizacao')->first()['valor'],
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

        return compact('dados','datatable','formulario');
    }

    static function create(){
        return 'create';
    }

    static function store($data){
        foreach( $data as $key => $datas ){
            $consulta = Model('Configuracoes')::where('chave',$key)->first();
            $consulta->update(['valor' => $datas]);
        }
        return back()->with('mensagem', 'Conteúdo atualizado com sucesso!');
    }

    static function show($url){
        $data = Registrations_Customers_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return 'edit';
        return Registrations_Customers_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return 'destroy';
        return Users::destroy($id);
    }
};