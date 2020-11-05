<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersConsultas extends Model{
	use SoftDeletes;

	public $table = 'users_consultas';
	public $primarykey = 'id';
	public $fillable = [
		'users_key','data_ultima_consulta','consulta_entrada','retorno_solicitado','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
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