<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ApenasProUsuario implements Scope
{
	public function apply(Builder $builder, Model $model)
	{
		if( Auth()->check() ){
			switch (Auth()->user()->nivel) {
				case 'cli':
				$builder->where('users_id', Auth()->User()->id)->orwhere('users_id', 0);
				break;

				default:
				$builder;
				break;
			}
		}
	}
}