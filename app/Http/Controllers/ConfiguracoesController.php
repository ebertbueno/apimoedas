<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Repositorie\ConfiguracoesRepositorie;

class ConfiguracoesController extends Controller{
	public function index(){
		$dados = ConfiguracoesRepositorie::index();
		return view('temas.inspinia.formulario',compact('dados'));
	}

	public function show(){
		return Model('Configuracoes')::get();
	}

	public function store(Request $request){
		$data = $request->except('_token');
		return ConfiguracoesRepositorie::store($data);
	}
}
