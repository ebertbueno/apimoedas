<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Repositorie\RelatoriosConsultasporClienteRepositorie;

class RelatoriosConsultasporClienteController extends Controller{
	public function index(){
		$dados = RelatoriosConsultasporClienteRepositorie::index();
		return view('temas.inspinia.listagem',compact('dados'));
	}

	public function show($id){
		return RelatoriosConsultasporClienteRepositorie::show($id);
	}
}