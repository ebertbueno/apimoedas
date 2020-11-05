<div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-content">
            <div>
                <h3 class="font-bold no-margins">
                    {!! trataTraducoes('Níveis do MMN') !!}
                    <small class="float-right">
                        {!! trataTraducoes('Perna selecionada') !!}: <span id="pernaMMNSelecionadaDashboard">{!! dadosUsuarioCompleto()['perna_mmn'] !!}</span> 
                        <a style="padding: 0px 5px" class="float-right" href="/change_leg_mmn?leg=e"> <i class="fa fa-align-left"> </i> </a>
                        <a style="padding: 0px 5px" class="float-right" href="/change_leg_mmn?leg=a"> <i class="fa fa-align-justify"> </i> </a>
                        <a style="padding: 0px 5px" class="float-right" href="/change_leg_mmn?leg=d"> <i class="fa fa-align-right"> </i> </a>
                    </small>
                </h3>   
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="stat-list m-t-lg">
                        @foreach( consultaConfiguracoesMMN()['configuracoes'] as $key => $data )
                        <li>
                            <h2 class="no-margins">{!! str_replace('usuarios_no_nivel_',trataTraducoes('Nível') . ' ',$data['chave']) !!}</h2>
                            <small>{!! trataTraducoes('Necessário') !!}: {!! $data['valor']!!}</small>
                            <div class="progress progress-mini">
                                <div class="progress-bar" style="width: {!! 0/$data['valor'] !!}%;"></div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>