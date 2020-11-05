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
            <div class="ibox-content no-padding">
                <ul class="list-group">

                    foreach($data['coments'] as $c)
                    <li class="list-group-item">
                        <p><a class="text-info" href="#">@{{ $data['twitter_user'] }}</a> {{ $data['comentario'] }}</p>
                        <small class="block text-muted"><i class="fa fa-clock-o"></i> {{ $data['tempos_passados'] }}</small>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>