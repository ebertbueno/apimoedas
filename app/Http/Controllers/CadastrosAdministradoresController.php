<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Repositorie\CadastrosAdministradoresRepositorie;

class CadastrosAdministradoresController extends Controller{
	public function index(){
		$dados = CadastrosAdministradoresRepositorie::index();
		return view('temas.inspinia.listagem',compact('dados'));
	}

	public function show($id){
		return CadastrosAdministradoresRepositorie::show($id);
	}

	public function create(){
		$dados = CadastrosAdministradoresRepositorie::createorEdit();
		return view('temas.inspinia.formulario',compact('dados'));
	}

	public function edit($id){
		$dados = CadastrosAdministradoresRepositorie::createorEdit($id);
		return view('temas.inspinia.formulario',compact('dados'));
	}

	public function store(Request $request){
		$data = $request->except('_token');
		return CadastrosAdministradoresRepositorie::store($data);
	}
}