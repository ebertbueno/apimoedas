<?php
function dateCalculate($date, $days=0, $intervall='y', $saida='Y-m-d'){
  if( $date ){
    $old = \Carbon\Carbon::createFromFormat('Y-m-d', $date);
    switch ($intervall) {
      case 'd':
      $old->addDays($days);
      break;

      case 'm':
      $old->addMonths($days);
      break;

      default:
      $old->addYears($days);
      break;
    }
    return $old->format($saida);
  }else{
    return null;
  }
}

