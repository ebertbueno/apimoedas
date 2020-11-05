<?php
Route::prefix('api')->group(function(){
	Route::prefix('{qualMoeda}')->group(function(){
		Route::get('/', 'API\ApiConsultaCripto@cripto');
		Route::get('{chaveAcesso}', 'API\ApiConsultaCripto@cripto');
	});
});
Route::get('painel', function (){
	return redirect('login');
});

Route::get('/', function () {return view('welcome');});
Route::get('api', function () {return view('welcome');});

Route::get('register', function(){ return redirect('/'); });
Route::post('register', function(){ return redirect('/'); });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {
	Route::resource('/configuracoes', 'ConfiguracoesController');
	Route::resource('/moedas/criptomoedas', 'MoedasCriptomoedasController');
	Route::resource('/moedas/moedas', 'MoedasMoedasController');
	Route::resource('/currencylayer', 'CurrencylayerController');
	Route::resource('/ips_bloqueados', 'IPSbloqueadosController');
	Route::resource('/cadastros/clientes', 'CadastrosClientesController');
	Route::resource('/cadastros/administradores', 'CadastrosAdministradoresController');
	Route::resource('/consultas_realizadas', 'ConsultasRealizadasController');
	Route::resource('/relatorios/consultas_realizadas', 'RelatoriosConsultasRealizadasController');
	Route::resource('/relatorios/consultas_por_cliente', 'RelatoriosConsultasporClienteController');

	Route::get('sair', function(){
		Auth::logout();
		return redirect('/');
	});
});