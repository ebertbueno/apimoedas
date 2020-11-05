<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class MultiEmpresaScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if( Auth()->check() ){
            switch (Auth()->user()->nivel) {
                case 'adm':
                case 'ger':
                    $builder;
                    break;

                default:
                    $builder->where('emp_id', site_id()['id'])->orwhere('emp_id', 0);
                    break;
            }
        }
    }
}