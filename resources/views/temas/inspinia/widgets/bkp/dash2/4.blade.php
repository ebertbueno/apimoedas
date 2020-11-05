<div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>{!! $data['titulo'] !!}</h5>
        </div>
        <div class="ibox-content table-responsive">
            <table class="table table-hover no-margins">
                <thead>
                    <tr>
                        @foreach($data['titulos_tabela'] as $t)
                        <th>{!! $t['nome'] !!}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['list'] as $l)
                    <tr>
                        <td>{!! dateBdToApp($l['data_hora'],2) !!}</td>
                        <td>{!! $l['nome'] !!}</td>
                        <td>{!! $l['email']!!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
