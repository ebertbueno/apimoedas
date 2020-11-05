<?php
namespace App\Http\Controllers\Repositorie;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use App\Repositories\Tratamentos;
use App\Repositories\Componentes;

class RelatoriosConsultasRealizadasRepositorie{

    CONST url = '/relatorios/consultas_realizadas';

    static function index(){
        $dados['titulo_pagina'] = RelatoriosConsultasRealizadasRepositorie::url;
        $dados['rota_geral'] = RelatoriosConsultasRealizadasRepositorie::url;
        $dados['formulario_adicional'] = 'listagem_busca_datas';
        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>15,'label'=>'IP ou Chave','nome_no_banco_de_dados'=>'users_key',],
            ['tabela'=>15,'label'=>'Data','nome_no_banco_de_dados'=>'data_ultima_consulta',],
            ['tabela'=>15,'label'=>'Consulta','nome_no_banco_de_dados'=>'consulta_entrada',],
            ['tabela'=>50,'label'=>'Retorno','nome_no_banco_de_dados'=>'retorno_solicitado',],
        ];

        return compact('dados','datatable');
    }



    static function show($id){
        $dataIni = ( !empty($dataIni) ? $dataIni : date('Y-m-01 00:00:00') );
        $dataFim = ( !empty($dataFim) ? $dataFim : date('Y-m-'.ultimoDiaMes().' 23:59:59') );

        $data = Model('UsersConsultas')::whereBetween('created_at',[$dataIni,$dataFim])->get();

        foreach( $data as $key => $d ){
            $d['contador'] = ($key+1);
        }
        return compact('data');
    }
};