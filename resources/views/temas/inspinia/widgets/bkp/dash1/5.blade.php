<div class="ibox ">
    <div class="ibox-title">
        <h5>{{ $data['titulo'] }}</h5>
        <div class="ibox-tools" style="padding-right: 20px;">
            <a class="collapse-link" href="">
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
            <a class="close-link" href="">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>

    <div class="ibox-content ibox-heading">
        <h3>{{ $data['subtitulo']}}</h3>
        <small><i class="fa fa-map-marker"></i> {{ $data['subtitulo_descricao']}}</small>
    </div>
    <div class="ibox-content inspinia-timeline">
                                    <!--
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-4 date">
                                                <i class="fa fa-briefcase"></i>
                                                6:00 am
                                                <br>
                                                <small class="text-navy">2 hour ago</small>
                                            </div>
                                            <div class="col content no-top-border">
                                                <p class="m-b-xs"><strong>Meeting</strong></p>

                                                <p>Conference on the sales results for the previous year. Monica please examine sales trends in marketing and products. Below please find the current status of the
                                                    sale.</p>

                                                <p><span data-diameter="40" class="updating-chart" style="display: none;">10,5,5,7,6,1,8,7,3,7,9,9,10,4,2,2,4,5,2,7,7,3,7,6,3,6,8,6,5,8,5,9,6,1,3,6,9</span><svg class="peity" height="16" width="64"><polygon fill="#1ab394" points="0 15 0 0.5 1.7777777777777777 8 3.5555555555555554 8 5.333333333333333 5 7.111111111111111 6.5 8.88888888888889 14 10.666666666666666 3.5 12.444444444444443 5 14.222222222222221 11 16 5 17.77777777777778 2 19.555555555555554 2 21.333333333333332 0.5 23.11111111111111 9.5 24.888888888888886 12.5 26.666666666666664 12.5 28.444444444444443 9.5 30.22222222222222 8 32 12.5 33.77777777777778 5 35.55555555555556 5 37.33333333333333 11 39.11111111111111 5 40.888888888888886 6.5 42.666666666666664 11 44.44444444444444 6.5 46.22222222222222 3.5 48 6.5 49.77777777777777 8 51.55555555555555 3.5 53.33333333333333 8 55.11111111111111 2 56.888888888888886 6.5 58.666666666666664 14 60.44444444444444 11 62.22222222222222 6.5 64 2 64 15"></polygon><polyline fill="transparent" points="0 0.5 1.7777777777777777 8 3.5555555555555554 8 5.333333333333333 5 7.111111111111111 6.5 8.88888888888889 14 10.666666666666666 3.5 12.444444444444443 5 14.222222222222221 11 16 5 17.77777777777778 2 19.555555555555554 2 21.333333333333332 0.5 23.11111111111111 9.5 24.888888888888886 12.5 26.666666666666664 12.5 28.444444444444443 9.5 30.22222222222222 8 32 12.5 33.77777777777778 5 35.55555555555556 5 37.33333333333333 11 39.11111111111111 5 40.888888888888886 6.5 42.666666666666664 11 44.44444444444444 6.5 46.22222222222222 3.5 48 6.5 49.77777777777777 8 51.55555555555555 3.5 53.33333333333333 8 55.11111111111111 2 56.888888888888886 6.5 58.666666666666664 14 60.44444444444444 11 62.22222222222222 6.5 64 2" stroke="#169c81" stroke-width="1" stroke-linecap="square"></polyline></svg></p>
                                            </div>
                                        </div>
                                    </div> -->

                                    @foreach($data['item'] as $d) 
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-4 date">
                                                <i class="fa fa-file"></i>
                                                {{ $d->horario }}
                                                <br>
                                                <small class="text-navy">3 hour ago</small>
                                            </div>
                                            <div class="col content">
                                                <p class="m-b-xs"><strong>{{ $d->titulo }}</strong></p>
                                                <p>{{ $d->descricao }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>