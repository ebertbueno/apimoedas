<!--
$d->op = (
sucess,
info,
navy,
danger

)

-->


<div class="row">


    @foreach($data['list'] as $l)
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-primary float-right">{{ $l->periodo }}</span>
                <h5>{{ $l->descricao }}</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">$ {{ number_foramt($l->valor,2,',','.') }}</h1>
                <div class="stat-percent font-bold text-{{ $l->op }}">{{ $l->porcentagem }} <i class="fa fa-level-up"></i></div>
                <small>{{ $l->sub_descricao }}</small>
            </div>
        </div>
    </div>
    @endforeach

</div>