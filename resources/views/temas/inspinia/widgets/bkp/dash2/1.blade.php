<!--
$d->operacao = (
sucess,
info,
navy,
danger
)

-->

@foreach($data as $d)
<div class="col-lg-3">
    <div class="ibox ">
        <div class="ibox-title">
            <?php
            /*
            <span class="label label-success float-right">{{ $d['periodo'] }}</span>
            */
            ?>
            <h5>{{ $d['titulo'] }}</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins">{{ number_format($d['quantidade'],2,',','.') }}</h1>
            <?php
            /*
            <div class="stat-percent font-bold text-{{ $d['operacao'] }}">{{ $d['porcentagem'] }}% <i class="fa fa-money"></i></div>
            */
            ?>
            <small>{{ $d['descricao'] }}</small>
        </div>
    </div>
</div>
@endforeach
