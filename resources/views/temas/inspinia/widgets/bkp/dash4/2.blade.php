<script>
$(function(){
    $('button').click(function(){
        $('input').select();
        var copiar = document.execCommand('copy');
        if(copiar){
            alert('@lang('global-'.idiomaPadrao().'.seu_codigo_foi_copiado_com_sucesso')');
        }else {
            alert('@lang('global-'.idiomaPadrao().'.erro_ao_copiar_seu_codigo_seu_navegador_nao_tem_suporte_a_essa_funcao')');
        }
        return false;
    });
});
</script>

<div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <?php
            /*
            <span class="label label-primary float-right">{{ $data['periodo'] }}</span>
            */
            ?>
            <h5>{{ $data['descricao'] }}</h5>
        </div>
        <div class="ibox-content">

            <div class="row">
                <div class="col-md-6 text-center">
                    <h1 class="no-margins">{{ $data['esquerda']['valor'] }}</h1>
                    <div class="font-bold text-navy">{{ $data['esquerda']['porcentagem'] }} <i class="fa fa-level-down"></i> <small>{{ $data['esquerda']['texto'] }}</small></div>
                </div>
                <div class="col-md-6 text-center">
                    <h1 class="no-margins">{{ $data['direita']['valor'] }}</h1>
                    <div class="font-bold text-navy">{{ $data['direita']['porcentagem'] }} <i class="fa fa-level-down"></i> <small>{{ $data['direita']['texto'] }}</small></div>
                </div>
            </div> <br>
            <div class="row">
                <div class="col-md-12">
                    @if( !is_null(Auth()->user()->matricula) )
                    <small class="col-sm-6 float-left">
                        <input class="float-left" type="text" value="{!! url('/register/'.Auth()->user()->matricula) !!}" style="width: 100% !important; border: 0px; background-color: transparent;" readonly="readonly">
                    </small>
                    <small class="col-sm-6 float-right">
                        <button class="btn btn-sm btn-link float-right no-padding"><i class="fa fa-copy"></i> <small>{!! trataTraducoes('Copiar código de indicação') !!}</small> </button>
                    </small>
                    @else
                    <p class="text-center">
                        {!! trataTraducoes('campoaqui') !!}
                    </p>
                    @endif
                </div>
            </div>


        </div>
    </div>
</div>