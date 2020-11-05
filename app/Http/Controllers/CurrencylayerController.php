<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Repositorie\CurrencylayerRepositorie;

class CurrencylayerController extends Controller{
	public function index(){
		$dados = CurrencylayerRepositorie::index();
		return view('temas.inspinia.listagem',compact('dados'));
	}

	public function show($id){
		return CurrencylayerRepositorie::show($id);
	}

	public function create(){
		$dados = CurrencylayerRepositorie::createorEdit();
		return view('temas.inspinia.formulario',compact('dados'));
	}

	public function edit($id){
		$dados = CurrencylayerRepositorie::createorEdit($id);
		return view('temas.inspinia.formulario',compact('dados'));
	}

	public function store(Request $request){
		$data = $request->except('_token');
		return CurrencylayerRepositorie::store($data);
	}
}
