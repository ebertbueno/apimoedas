<div class="col-md-12">
    <div class="statistic-box">
        <h4>
            {{ $data['titulo'] }}
        </h4>
        <p>
            {{ $data['descricao']}}
        </p>


        <div class="row text-center">
            <div class="col-lg-6"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                <canvas id="doughnutChart2" width="100" height="100" style="margin: 18px auto 0px; display: block; width: 80px; height: 80px;">
                </canvas>
                <h5> {{ $data['chart1']['titulo'] }}</h5>
            </div>
        </div>

        <div class="m-t">
            <small>{{ $data['adicionais']}}</small>
        </div>

    </div>
</div>


