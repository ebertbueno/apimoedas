<div class="col-md-3">
  <h2>{{titulo}}</h2>
  <small>{{$descricao}}</small>
  <ul class="list-group clear-list m-t">
    @foreach($list as $l)
    <li class="list-group-item {{ ($l->numero == 1) 'fist' : ''}}-item">
      <span class="float-right">
        {{ $l->horario }}
      </span>
      <span class="label label-success">{{ $l->numero }}</span> {{$l->informacao}}
    </li>
    @endforeach
  </ul>
</div>