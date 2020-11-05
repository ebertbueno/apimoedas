<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Repositorie\MoedasMoedasRepositorie;

class MoedasMoedasController extends Controller{
	public function index(){
		$dados = MoedasMoedasRepositorie::index();
		return view('temas.inspinia.listagem',compact('dados'));
	}

	public function show($id){
		return MoedasMoedasRepositorie::show($id);
	}

	public function create(){
		$dados = MoedasMoedasRepositorie::createorEdit();
		return view('temas.inspinia.formulario',compact('dados'));
	}

	public function edit($id){
		$dados = MoedasMoedasRepositorie::createorEdit($id);
		return view('temas.inspinia.formulario',compact('dados'));
	}

	public function store(Request $request){
		$data = $request->except('_token');
		return MoedasMoedasRepositorie::store($data);
	}
}