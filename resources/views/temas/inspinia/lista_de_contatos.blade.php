<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <h4 style="float: right;">@include('cabecalho')</h4>
                <div class="ibox-title">
                    <h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
                    <div class="ibox-tools" style="padding-right: 20px;">
                        {!! ( !empty($dados['dados']['botoes_da_datatable']) ? $dados['dados']['botoes_da_datatable'] : Null ) !!}
                    </div>
                </div>
                <div class="ibox-content">
                    <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="{!! trataTraducoes('Filtre seus contatos') !!}">
                    <div class="col-md-12">&nbsp;</div>
                    <div class="col-md-12">
                        <div class="row" id="myTable" style="overflow: hidden;">
                            @forelse( pegaContatosChat() as $key => $data )
                            @include('temas.inspinia.lista_de_contatos_layout')
                            @empty
                            <p class="text-center">{!! trataTraducoes('Nenhum contato encontrado') !!}</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    function myFunction() {
        var input, filter, table, tr, td, i, div, strong, h1, h2, h3, h4, h5, h6, p, abbr, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("table");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("div")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }       
        }
    }
</script>