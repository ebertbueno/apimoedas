<?php
namespace App\Repositories;
use App\Models\UsersAcesso;
use App\Models\UsersNiveis;
use App\Models\Menu;
use App\Models\User;
use App\Models\EmpresasClientes;

class MenuSistema{

	static function MenuSistema(){

    if( Auth()->check() ){



      ##############################################################################################################################
      // valida qual a plataforma que está sendo acessada, e qual a estrutura de menu será exibida
      if( !empty($_SESSION['EmpresasClientes']) ){
        $_SESSION['EmpresasClientes'] = $_SESSION['EmpresasClientes'];
      } else {
        $EmpresasClientes = EmpresasClientes::where('emp_id', site_id()['id'])->where('users_id', Auth()->user()->id)->where('modulo', site_id()['modulo'])->where('nivel', Auth()->user()->nivel)->first();

        $_SESSION['EmpresasClientes'] = ( !empty($EmpresasClientes) ? $EmpresasClientes['id'] : Null );
        
        if( !Auth()->check() && empty($EmpresasClientes) ){
          dd($EmpresasClientes);
          echo '<script>window.location.href = "'.url('/').'";</script>';
          dd();
        }
      }
      // valida qual a plataforma que está sendo acessada, e qual a estrutura de menu será exibida
      ##############################################################################################################################

      $users_id = ( !empty(Auth()->user()->nivel) ? Auth()->user()->nivel : 'vazio' );

      $permitido = UsersAcesso::
                              where('users_acesso.modulo', site_id()['modulo'])->
                              where('users_acesso.users_id', $users_id)->
                              where('menu.deleted_at', Null)->
                              // groupby('users_acesso.menu_id')->
                              select(['users_acesso.menu_id','menu.id','menu.root','menu.menu','menu.icone','menu.ordem','menu.link','menu.target',])->
                              leftjoin('menu', 'menu.id', '=', 'users_acesso.menu_id')->
                              orderby('menu.ordem')->
                              orderby('menu.menu')->
                              get();
                              // count();

      $nivel = ( !empty(Auth()->user()->nivel) ? Auth()->user()->nivel : 'vazio' );

      if( $nivel === 'adm' ){
        $permitido = Menu::orderby('root')->orderby('ordem')->get();
      }

      $menuMontado['menu'] = [];
      foreach ($permitido as $menu1) {
        if( (int)$menu1['root'] === 0 ){
          $menuMontado['menu'][$menu1['id']]['id'] = $menu1['id'];
          $menuMontado['menu'][$menu1['id']]['root'] = $menu1['root'];
          $menuMontado['menu'][$menu1['id']]['menu'] = $menu1['menu'];
          $menuMontado['menu'][$menu1['id']]['icone'] = $menu1['icone'];
          $menuMontado['menu'][$menu1['id']]['ordem'] = $menu1['ordem'];
          $menuMontado['menu'][$menu1['id']]['link'] = $menu1['link'];
          $menuMontado['menu'][$menu1['id']]['target'] = $menu1['target'];
          $menuMontado['menu'][$menu1['id']]['filhos'] = [];

          foreach ($permitido as $key2 => $menu2) {
            if( (int)$menu1['id'] === (int)$menu2['root'] ){
              $menuMontado['menu'][$menu1['id']]['filhos'][$key2]['id'] = $menu2['id'];
              $menuMontado['menu'][$menu1['id']]['filhos'][$key2]['root'] = $menu2['root'];
              $menuMontado['menu'][$menu1['id']]['filhos'][$key2]['menu'] = $menu2['menu'];
              $menuMontado['menu'][$menu1['id']]['filhos'][$key2]['icone'] = $menu2['icone'];
              $menuMontado['menu'][$menu1['id']]['filhos'][$key2]['ordem'] = $menu2['ordem'];
              $menuMontado['menu'][$menu1['id']]['filhos'][$key2]['link'] = $menu2['link'];
              $menuMontado['menu'][$menu1['id']]['filhos'][$key2]['target'] = $menu2['target'];

              // foreach ($permitido as $key3 => $menu3) {
              //   if( (int)$menu2['id'] === (int)$menu3['root'] ){
              //     $menuMontado['menu'][$menu1['id']]['filhos'][$key2]['filhos'][$key3]['id'] = $menu3['id'];
              //     $menuMontado['menu'][$menu1['id']]['filhos'][$key2]['filhos'][$key3]['root'] = $menu3['root'];
              //     $menuMontado['menu'][$menu1['id']]['filhos'][$key2]['filhos'][$key3]['menu'] = $menu3['menu'];
              //     $menuMontado['menu'][$menu1['id']]['filhos'][$key2]['filhos'][$key3]['icone'] = $menu3['icone'];
              //     $menuMontado['menu'][$menu1['id']]['filhos'][$key2]['filhos'][$key3]['link'] = $menu3['link'];
              //     $menuMontado['menu'][$menu1['id']]['filhos'][$key2]['filhos'][$key3]['target'] = $menu3['target'];
              //     return $menuMontado;
              //   }
              // }
            }
          }
        }
      }

      usort($menuMontado['menu'], function ($a, $b) {
        return $a['ordem'] > $b['ordem'];
      });

  // usort($menuMontado, function ($a, $b) {
  //   return $a['ordem'] < $b['ordem'];
  // });

      $menuMontado['niveis'] = EmpresasClientes::where('emp_id', site_id()['id'])->where('users_id', Auth()->user()->id)->where('modulo', site_id()['modulo'])->get();

      return $menuMontado;
    }
  }




  static function niveisAcesso(){
    $menu = Menu::where('root', 0)->where('habilita_modulos', 1)->orderby('ordem')->orderby('menu')->get();
    $permitido = UsersAcesso::where('modulo', Auth()->user()->modulo)->where('users_id', Auth()->user()->nivel)->orwhere('users_id', Auth()->user()->id)->select('menu_id')->get();
    $retornoPermitido = '';
    foreach ($permitido as $permitidos) {
      $retornoPermitido .= '|'.$permitidos['menu_id'].'|,';
    }

    return $retornoPermitido;
  }




  static function niveisAcessoJaLiberado($nivel = ''){

    $nivel = ( empty($nivel) ? Auth()->user()->nivel : $nivel );
    $niveisacessoaaliberado = '|0|,';
    $permitido = UsersAcesso::
    where('modulo', Auth()->user()->modulo)->
    where('users_id', $nivel)->
    select('menu_id')->
    get();
    foreach ($permitido as $permitidos) {
      $niveisacessoaaliberado .= '|'.$permitidos['menu_id'].'|,';
    }

    return $niveisacessoaaliberado;
  }




  static function consultaNivelAcesso(){
    $dados = UsersNiveis::where('sigla', Auth()->user()->nivel)->orderby('ordem')->first();
    return UsersNiveis::where('ordem', '>', $dados['ordem'])->orderby('ordem')->get();
  }
};