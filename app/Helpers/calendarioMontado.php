<?php

function calendarioMontado($data=''){
    $bordaGeral = ' border:1px solid #cecece; padding:0px !important; ';

    $data = ( !empty($data) ? $data : date('Y-m-d') );
    $dataSeparada = explode('-',$data);

    $ano = (int)( !empty($dataSeparada[0]) ? $dataSeparada[0] : date('Y') );
    $mes = (int)( !empty($dataSeparada[1]) ? $dataSeparada[1] : date('m') );

    if( !empty($_SESSION['trocaMes']) ){
        $explode = explode('-',$_SESSION['trocaMes']);
        $ano = (int)$explode[0];
        $mes = (int)$explode[1];
    }

    date_default_timezone_set('America/Sao_Paulo');
    $hoje = getdate(strtotime($data));
    $ultimoDia = cal_days_in_month(CAL_GREGORIAN,$mes,$ano);

    $dias_semana = diaDaSemana();

    $primeiraSemana = (($hoje['wday'] + 1) - ($hoje['mday'] - ((int)($hoje['mday'] / 6) * 7))) % 7;

    $calendarioMontado = '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="'.$bordaGeral.';">';
    $calendarioMontado .= '<tr>';
    foreach( $dias_semana as $diasSemana ){
        $calendarioMontado .= '<td style="text-align:center; width: '.round(100/7,5).'% !important;'.$bordaGeral.'"><li class="btn btn-info btn-block active" style="padding:15px 5px; border-radius:0px;">'.$diasSemana['reduzido'].'</li></td>';
    }
    $calendarioMontado .= '</tr>';
    $calendarioMontado .= '<tr>';

    for($semana = 0; $semana < $primeiraSemana; ++$semana) {
        $calendarioMontado .= '<td style="height: 40px !important;'.$bordaGeral.'">&nbsp;</td>';
    }
    for($dia = 1; $dia <= $ultimoDia; ++$dia) {
        if( $semana > 6 ) {
            $semana = 0;
            $calendarioMontado .= '</tr><tr>';
        }



        $calendarioMontado .= '<td style="text-align:center !important; height: 40px !important; '.$bordaGeral.'">';
        if( (int)$dia >= (int)date('d') ){
            $calendarioMontado .= '<a href="?data='.$ano.'-'.$mes.'-'.$dia.'" class="'.( (int)$dia === (int)date('d') && (int)$mes === (int)date('m') ? 'text-danger' : 'text-primary' ).'">';
            $calendarioMontado .= '<li class="btn btn-info" style="border-radius: 0px;">';
            $calendarioMontado .= $dia;
        } else {
            $calendarioMontado .= '<strong>'.$dia.'</strong>';
        }



        $calendarioMontado .= '</li>';
        $calendarioMontado .= '</a>';
        $calendarioMontado .= '</td>';
        ++$semana;
    }
    for(; $semana < 7; ++$semana) {
        $calendarioMontado .= '<td style="'.$bordaGeral.'">&nbsp;</td>';
    }
    $calendarioMontado .= '</tr>';
    $calendarioMontado .= '</table>';

    return $calendarioMontado;
}