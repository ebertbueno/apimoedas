<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Repositorie\CadastrosClientesRepositorie;

class CadastrosClientesController extends Controller{
	public function index(){
		$dados = CadastrosClientesRepositorie::index();
		return view('temas.inspinia.listagem',compact('dados'));
	}

	public function show($id){
		return CadastrosClientesRepositorie::show($id);
	}

	public function create(){
		$dados = CadastrosClientesRepositorie::createorEdit();
		return view('temas.inspinia.formulario',compact('dados'));
	}

	public function edit($id){
		$dados = CadastrosClientesRepositorie::createorEdit($id);
		return view('temas.inspinia.formulario',compact('dados'));
	}

	public function store(Request $request){
		$data = $request->except('_token');
		return CadastrosClientesRepositorie::store($data);
	}
}