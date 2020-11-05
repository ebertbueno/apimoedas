<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{!! url(fotoPerfil()) !!}" style="max-width: 50px !important; height: auto !important;" />
                    <a data-toggle="dropdown" class="dropdown-toggle" style="cursor: pointer; color: #fff">
                        <span class="block m-t-xs font-bold">
                            <img src="/images/status_{!! dadosUsuarioCompleto()['status_usuario'] !!}.png" align="left" style="height: 20px; width: 20px; margin-right: 5px;"> {!! explode(' ',Auth()->user()->name)[0] !!}
                            <b class="caret"></b>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        @if( !is_null(dadosUsuarioCompleto()['termos_e_condicoes']) )
                        <li><a>{!! trataTraducoes('Status') !!}</a></li>
                        <li>
                            <div class="row">
                                <div class="col-2" style="padding:0px;"></div>
                                <div class="col-2"><a href="/settings/my_profile?change_status=online"><img src="/images/status_online.png" align="left" style="height: 15px; width: 15px; margin-right: 5px;"></a></div>
                                <div class="col-2"><a href="/settings/my_profile?change_status=absent"><img src="/images/status_absent.png" align="left" style="height: 15px; width: 15px; margin-right: 5px;"></a></div>
                                <div class="col-2"><a href="/settings/my_profile?change_status=busy"><img src="/images/status_busy.png" align="left" style="height: 15px; width: 15px; margin-right: 5px;"></a></div>
                                <div class="col-2"><a href="/settings/my_profile?change_status=invisible"><img src="/images/status_invisible.png" align="left" style="height: 15px; width: 15px; margin-right: 5px;"></a></div>

                            </div>
                        </li>
                        <li><a class="dropdown-item" onclick="montaTela('/settings/my_profile');fechaMenu();" style="cursor: pointer !important;">{!! trataTraducoes('Perfil') !!}</a></li>
                        @endif
                        <li><a class="dropdown-item" href="/sair">{!! trataTraducoes('Sair') !!}</a></li>
                    </ul>
                </div>
                <div class="logo-element"><img src="/clientes/{!! site_id()['id'] !!}/letra.png" style="max-width: 40px;"></div>
            </li>

            <li class=""><a href="/" style="color: #fff !important;"><i class="fa fa-dashboard"></i> <span class="nav-label">{!! trataTraducoes('Início') !!}</span></a></li>

            @forelse( MenuGeral() as $key => $menu0 )
            @if( count($menu0['menuFilho']) > 0 )
            <li class="">
                <a style="color: #fff !important;"> <i class="{!! $menu0['icone'] !!}"></i> <span class="nav-label">{!! trataTraducoes($menu0['menu']) !!}</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    @forelse( $menu0['menuFilho'] as $key => $menu1  )
                    <li class=""><a onclick="montaTela('{!! $menu1['link'] !!}');fechaMenu();" style="cursor: pointer; color: #fff !important;line-height: 1"><i class="{!! $menu1['icone'] !!}"></i> {!! trataTraducoes($menu1['menu']) !!}</a></li>
                    @empty
                    @endforelse
                </ul>
            </li>
            @else
            <li class=""><a onclick="montaTela('{!! $menu0['link'] !!}');fechaMenu();" style="cursor: pointer; color: #fff !important;"><i class="{!! $menu0['icone'] !!}"></i> <span class="nav-label" style="line-height: 1">{!! trataTraducoes($menu0['menu']) !!}</span></a></li>
            @endif
            @empty
            @endforelse
            <li class=""><a href="/sair" style="color: #fff !important;"><i class="fa fa-power-off"></i> <span class="nav-label">{!! trataTraducoes('Sair') !!}</span></a></li>
        </ul>
    </div>
</nav>