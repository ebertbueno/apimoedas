<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                    <div>
                        <span class="float-right text-right">
                        <small>{{ $data['descricao']}}: <strong>{{ $data['pais']}}</strong></small>
                            <br>
                            {{ $data['value_description']}}: {{ number_format($data['valor'],2,',','.') }}
                        </span>
                        <h1 class="m-b-xs">$ {{ number_format($data['total'],2,',','.') }}</h1>
                        <h3 class="font-bold no-margins">
                             {{ $data['titulo']}}
                        </h3>
                        <small> {{ $data['subtitulo']}}</small>
                    </div>

                <div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                    <canvas id="lineChart" height="217" width="936" style="display: block; width: 749px; height: 174px;"></canvas>
                </div>

                <div class="m-t-md">
                    <small class="float-right">
                        <i class="fa fa-clock-o"> </i>
                        Atualizado em {{ $data['data_de_atualizacao']}}
                    </small>
                   <small>
                       <strong> {{ $data['titulo_descricao_principal']}}:</strong>  {{ $data['descricao_principal']}}
                   </small>
                </div>

            </div>
        </div>
    </div>
</div>