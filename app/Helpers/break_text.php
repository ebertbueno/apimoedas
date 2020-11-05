<?php
function break_text($text, $limit='') {
  $limit = ( !empty($limit) ? $limit : strlen($text) );
  $pos = strpos($text, ' ', $limit);
  return substr($text, 0, $limit) . '...';
}