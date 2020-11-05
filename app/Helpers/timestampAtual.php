<?php
function timestampAtual(){
	return (new DateTime())->getTimestamp();
}