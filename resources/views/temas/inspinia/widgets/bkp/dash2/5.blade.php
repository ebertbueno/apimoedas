<div class="col-lg-12">
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
        <div class="ibox-content">
            <ul class="todo-list m-t small-list">
                @foreach($data['list'] as $l)
                <li>
                    <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>
                    <span class="m-l-xs todo-completed">{{ $l->nome }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>