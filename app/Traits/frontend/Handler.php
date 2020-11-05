<?php
namespace App\Traits\frontend;
use Auth;
use View;
use App\Repositories\MenuSistema;

trait Handler {
  public function __construct() {
    $this->middleware(function($request, $next) {
      View::share(['menu' => MenuSistema::MenuSistema()]);
      return $next($request);
    });
  }
}