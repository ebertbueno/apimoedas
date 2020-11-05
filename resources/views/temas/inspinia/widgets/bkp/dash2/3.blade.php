<div class="row">
	<div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>{{ $data['titulo'] }}</h5>
                <div class="ibox-tools" style="padding-right: 20px;">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content ibox-heading">
                <h3><i class="fa fa-envelope-o"></i> {{ $data['descricao'] }}</h3>
                <small><i class="fa fa-tim"></i>{{ $data['qual_notificacao'] }}</small>
            </div>
            <div class="ibox-content">
                <div class="feed-activity-list">

                   @foreach($data['list'] as $l)
                   <div class="feed-element">
                    <div>
                        <small class="float-right text-navy">{{ $l->time }}</small> <!--Fazer o calculo de tempo -->
                        <strong>{{ $l->remetente }}</strong>
                        <div>{{ subst($l->mensagem, 0, 64) }}</div>
                        <small class="text-muted">{{ $l->dia}} {{ $l->horario}} pm - {{ $l->data}} </small>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
</div>