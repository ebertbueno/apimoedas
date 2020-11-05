<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Repositorie\RelatoriosConsultasRealizadasRepositorie;

class RelatoriosConsultasRealizadasController extends Controller{
	public function index(){
		$dados = RelatoriosConsultasRealizadasRepositorie::index();
		return view('temas.inspinia.listagem',compact('dados'));
	}

	public function show($id){
		return RelatoriosConsultasRealizadasRepositorie::show($id);
	}
}