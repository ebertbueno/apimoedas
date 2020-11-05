<?php
function direcionaAposConcluirPaciente($data = '')
{
    $cor = (!empty($data['cor']) ? $data['cor'] : 'success');
    $titulo = trataTraducoes(!empty($data['titulo']) ? $data['titulo'] : 'tudo_certo');
    $mensagem = trataTraducoes(!empty($data['mensagem']) ? $data['mensagem'] : 'operacao_realizada_com_sucesso');

    return "
    <script>
    function toastr(){
        $.niftyNoty({
            type: '".$cor."',
            container: 'floating',
            title: '".$titulo."',
            message: '".$mensagem."',
            closeBtn: true,
            timer: 2000,
        });
    };
    onload='toastr()';
    </script>
    ";
}
