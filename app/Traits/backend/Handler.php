<?php
namespace App\Traits\backend;
use Auth;
use View;
use App\Repositories\Modulos;
use App\Repositories\MenuSistema;
use App\Repositories\WidgetRepositorie;
use App\Repositories\WebsiteRepositorie;
use App\Repositories\backend\home\HomeRepositorie;
use App\Models\Dashboard;

trait Handler {
  public function __construct() {


    // para o menu do sistema
    $this->middleware(function($request, $next) {
      View::share(['menu' => MenuSistema::MenuSistema()]);
      return $next($request);
    });



    // para o widget da dashboard Cliente
    $this->middleware(function($request, $next) {
      View::share(['widgetCliente' => qualWidgetExibe()['quadros']]);
      return $next($request);
    });



    // para os widgets na página inicial
    $this->middleware(function($request, $next) {
      View::share(['dadosWebsite' => WebsiteRepositorie::dadosWebsite()]);
      return $next($request);
    });

    // para os widgets na página inicial
    // $this->middleware(function($request, $next) {
    //   View::share(['widgets' => WidgetRepositorie::WidgetRepositorie()]);
    //   return $next($request);
    // });
  }
}