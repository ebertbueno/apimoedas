<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Repositorie\MoedasCriptomoedasRepositorie;

class MoedasCriptomoedasController extends Controller{
	public function index(){
		$dados = MoedasCriptomoedasRepositorie::index();
		return view('temas.inspinia.listagem',compact('dados'));
	}

	public function show($id){
		return MoedasCriptomoedasRepositorie::show($id);
	}

	public function create(){
		$dados = MoedasCriptomoedasRepositorie::createorEdit();
		return view('temas.inspinia.formulario',compact('dados'));
	}

	public function edit($id){
		$dados = MoedasCriptomoedasRepositorie::createorEdit($id);
		return view('temas.inspinia.formulario',compact('dados'));
	}

	public function store(Request $request){
		$data = $request->except('_token');
		return MoedasCriptomoedasRepositorie::store($data);
	}
}