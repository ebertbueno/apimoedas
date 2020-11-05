<ul class="list-group elements-list">
    @forelse( $dadosLoop[$tipo] as $key => $data )
    <li class="list-group-item">
        <a class="nav-link" data-toggle="tab" href="#tab-{!! $tipo !!}-{!! $key !!}">
            <p><small class="float-right text-muted"> {!! dateTimeBdToApp($data['created_at']) !!} </small></p>
            <strong>{!! $data['assunto'] !!}</strong>
            <div class="small m-t-xs">
                <p class="m-b-xs">
                    <strong>{!! $data['users_id_to'] === Auth()->user()->id ? trataTraducoes('Para') : trataTraducoes('De') !!}</strong>
                    {!! ( !empty($data['nomeRemetente']->name) ? $data['nomeRemetente']->name : trataTraducoes('Não localizado') ) !!}
                </p>
            </div>
        </a>
    </li>
    @empty
    @endforelse
</ul>