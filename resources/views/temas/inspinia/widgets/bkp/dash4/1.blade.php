<!--
$data['operacao'] = (
sucess,
info,
navy,
danger
)
-->

<div class="row">
    <div class="col-lg-2">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right">{{ $data['periodo'] }}</span>
                <h5>{{ $data['titulo'] }}</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ number_format($data['periodo'],2,',','.') }}</h1>
                <div class="stat-percent font-bold text-{{ $data['operacao'] }}">{{ $data['porcentagem'] }}% <i class="fa fa-bolt"></i></div>
                <small>{{ $data['descricao_porcentagem'] }}</small>
            </div>
        </div>
    </div>
</div>