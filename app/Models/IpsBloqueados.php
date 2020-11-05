<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IpsBloqueados extends Model{
	use SoftDeletes;

	public $table = 'ips_bloqueados';
	public $primarykey = 'id';
	public $fillable = [
		'ip','regiao','motivo_bloqueio','bloqueado_por','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];
	public $hidden = [
		'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

	protected static function boot()
	{
		parent::boot();

		if( Auth()->check() ){
			self::creating(function ($model) {
				$model->created_by = Auth()->user()->id;
				$model->created_from = pegaIPUsuario();
			});

			self::updating(function ($model) {
				$model->updated_by = Auth()->user()->id;
				$model->updated_from = pegaIPUsuario();
			});

			self::deleting(function ($model) {
				$model->deleted_by = Auth()->user()->id;
				$model->deleted_from = pegaIPUsuario();
			});
		}
	}
}