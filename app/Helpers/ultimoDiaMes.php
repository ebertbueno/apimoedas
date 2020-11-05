<?php
function ultimoDiaMes(){
	return cal_days_in_month(CAL_GREGORIAN, date('m') , date('Y'));
}