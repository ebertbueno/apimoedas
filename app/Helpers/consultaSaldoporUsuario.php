<?php
function consultaSaldoporUsuario($qualSaldo='saldo_disp'){
  if( Auth()->check() ){
    return currencyToSystemDefaultBD(Model('FinanceiroSaldo')::sum($qualSaldo),configuracoesPlataforma()['qdade_casas_decimais']);
  }
}