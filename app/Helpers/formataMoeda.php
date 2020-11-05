<?php
function formataMoeda($curr, $casas=8){
  $curr = str_replace(' ', '', $curr);
  $curr = str_replace('.','',$curr);
  $curr = str_replace(',','.',$curr);
  return $curr;
}