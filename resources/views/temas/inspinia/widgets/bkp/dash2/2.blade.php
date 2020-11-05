<!--

$d->operacao = (
sucess,
info,
navy,
danger

)


-->

<div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Pedidos</h5>
            <div class="float-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-xs btn-white active">Hoje</button>
                    <button type="button" class="btn btn-xs btn-white">Mês</button>
                    <button type="button" class="btn btn-xs btn-white">Ano</button>
                </div>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-9">
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-dashboard-chart" style="padding: 0px; position: relative;">
                            <!-- Gráfico aqui -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <ul class="stat-list">

                        @foreach($data['list'] as $l)
                        <li>
                            <h2 class="no-margins">{{ number_format($l->total,2,',','.') }}</h2>
                            <small>{{ $l->descricao }}</small>
                            <div class="stat-percent">{{ $l->porcentagem }}% <i class="fa fa-level-up text-{{ $l->operacao }}"></i></div>
                            <div class="progress progress-mini">
                                <div style="width: {{ $l->porcentagem }}%;" class="progress-bar"></div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>