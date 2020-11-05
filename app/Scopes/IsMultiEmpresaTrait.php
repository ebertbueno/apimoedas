<?php
namespace App\Scope;
trait IsMultiEmpresaTrait {
    protected static function bootIsMultiEmpresa() {
        static::addGlobalScope( new MultiEmpresaScope );
    }
}