<?php
function trocaCoresWidget($cor = ''){
  switch ($cor) {
    case 'primary':
    return '#63A0D3';
    break;

    case 'success':
    return '#86CA86';
    break;

    case 'info':
    return '#9FDBEC';
    break;

    case 'warning':
    return '#F8D3A3';
    break;

    default:
    return '#E07572';
    break;
}
}