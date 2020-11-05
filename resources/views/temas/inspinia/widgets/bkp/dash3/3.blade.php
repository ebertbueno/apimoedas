<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>{{ $data['titulo'] }}</h5>
                <div class="ibox-tools" style="padding-right: 20px;">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" class="dropdown-item">Config option 1</a>
                        </li>
                        <li><a href="#" class="dropdown-item">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content ibox-heading">
                <h3>{{ $data['frase1'] }}
                    <div class="stat-percent text-navy">{{ $data['porcentagem'] }}% <i class="fa fa-level-up"></i></div>
                </h3>
                <small><i class="fa fa-stack-exchange"></i> {{ $data['frase'] }}</small>
            </div>
            <div class="ibox-content">
                <div>
                    <div class="float-right text-right">
                        <!-- Gráfico aqui-->
                        <br>
                        <small class="font-bold">${{ number_format($data['valor'],2,',','.') }}</small>
                    </div>
                    <h4>{{ $data['titulo_grafico'] }}
                        <br>
                        <small class="m-r"><a href="graph_flot.html"> {{ $data['frase_link_grafico'] }} </a> </small>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>