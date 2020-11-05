<div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>{{ $data['titulo'] }}</h5>
        </div>
        @foreach($data['list'] as $nivel0)
        <div class="ibox-content">
            <div class="row">
                @foreach($nivel0 as $nivel1)
                <div class="col-4">
                    <small class="stats-label">{{ $nivel1['titulo'] }}</small>
                    <h4>{{ $nivel1['valor'] }}</h4>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>