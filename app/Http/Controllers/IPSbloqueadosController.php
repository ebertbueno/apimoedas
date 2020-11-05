<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Repositorie\IPSbloqueadosRepositorie;

class IPSbloqueadosController extends Controller{
	public function index(){
		$dados = IPSbloqueadosRepositorie::index();
		return view('temas.inspinia.listagem',compact('dados'));
	}

	public function show($id){
		return IPSbloqueadosRepositorie::show($id);
	}

	public function create(){
		$dados = IPSbloqueadosRepositorie::createorEdit();
		return view('temas.inspinia.formulario',compact('dados'));
	}

	public function edit($id){
		$dados = IPSbloqueadosRepositorie::createorEdit($id);
		return view('temas.inspinia.formulario',compact('dados'));
	}

	public function store(Request $request){
		$data = $request->except('_token');
		return IPSbloqueadosRepositorie::store($data);
	}
}