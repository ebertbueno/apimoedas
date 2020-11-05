<?php

function diaDaSemana(){
	return [
		[
			'completo' => trataTraducoes('Domingo'),
			'reduzido' => trataTraducoes('Dom'),
			'compacto' => trataTraducoes('D'),
		],[
			'completo' => trataTraducoes('Segunda'),
			'reduzido' => trataTraducoes('Seg'),
			'compacto' => trataTraducoes('S'),
		],[
			'completo' => trataTraducoes('Terça'),
			'reduzido' => trataTraducoes('Ter'),
			'compacto' => trataTraducoes('T'),
		],[
			'completo' => trataTraducoes('Quarta'),
			'reduzido' => trataTraducoes('Qua'),
			'compacto' => trataTraducoes('Q'),
		],[
			'completo' => trataTraducoes('Quinta'),
			'reduzido' => trataTraducoes('Qui'),
			'compacto' => trataTraducoes('Q'),
		],[
			'completo' => trataTraducoes('Sexta'),
			'reduzido' => trataTraducoes('Sex'),
			'compacto' => trataTraducoes('S'),
		],[
			'completo' => trataTraducoes('Sábado'),
			'reduzido' => trataTraducoes('Sab'),
			'compacto' => trataTraducoes('S'),
		],
	];
}